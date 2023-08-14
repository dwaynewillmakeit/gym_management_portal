<div>
  @can('view user accounts')
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">

            <h5 class="card-header">Users</h5>
          </div>

          <div class=" col-md-5">
            <input type="text" class="form-control" placeholder="Search Users" aria-label="Search Users"
                   aria-describedby="search-button" wire:model.debounce.500ms="searchName">
          </div>
        </div>


        @can('add user accounts')
          <div class="text-end pe-5 mb-3">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#addEditUserModal" wire:click="openAddEditUserModal">
              Add User
            </button>

          </div>
        @endcan

        <div class="table-responsive text-nowrap">

          <table class="table table-hover table-sm">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action Buttons</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">

            @foreach($users as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->is_active)
                    <span class="text-success">Active</span>
                  @else
                    <span class="text-danger">Disabled</span>
                  @endif</td>
                <td>
                  @can('edit user accounts')
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#addEditUserModal" wire:click="openAddEditUserModal({{$user}},true)">
                      Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#assignRolesModal" wire:click="openRolesModal({{$user}})">
                      Assign Roles
                    </button>
                  @endcan
                </td>
              </tr>

            @endforeach

            </tbody>
          </table>
          {{$users->links()}}
        </div>
      </div>
    </div>

    {{--  Add Edit Modal--}}
    <div class="modal fade" id="addEditUserModal" tabindex="-1" style="display: none;" aria-modal="true"
         role="dialog" wire:ignore.self>
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              @if($isEditMode)
                Edit User Account
              @else
                Create User Account
              @endif
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="save">
            <div class="modal-body">
              <div class="row  ">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" wire:model.lazy="user.name"/>
                    @error('user.name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" wire:model.lazy="user.email" id="email"/>
                    @error('user.email') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
                @if($isEditMode)
                  <div class="form-check my-3 ms-3">
                    <input class="form-check-input" type="checkbox" value="1" id="change-password-checkbox"
                           wire:model="isChangingPassword"/>
                    <label class="form-check-label" for="change-password-checkbox">
                      Change Password
                    </label>
                  </div>
                @endif
                @if(!$isEditMode||$isChangingPassword)
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input class="form-control" type="password" id="password"
                             wire:model.lazy="password">
                      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                @endif
                @if($isEditMode)
                  <div class="mb-3">
                    <label for="defaultSelect" class="form-label">Status</label>
                    <select id="defaultSelect" class="form-select" wire:model="isAccountActive">
                      <option value="active">Active</option>
                      <option value="disable">Disable</option>
                    </select>
                  </div>

                @endif

              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
              >Close
              </button>
              <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{--  End Add Edit Modal--}}

    {{--  Assign Roles Modal--}}
    <div class="modal fade" id="assignRolesModal" tabindex="-1" style="display: none;" aria-modal="true"
         role="dialog" wire:ignore.self>
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              User Roles
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="assignRolesToUser">
            <div class="modal-body">
              <div class="row">

                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="name" class="form-label">User:</label>
                    <input type="text" class="form-control" wire:model.lazy="user.name" readonly/>
                  </div>
                </div>
              </div>
              <h5 class="mt-5">Roles</h5>
              <hr>

              @foreach($roles as $role)

                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox"
                         value="{{$role->name}}"
                         id="permission-checkbox"
                         wire:model="assignedRoles"
                  >

                  <label class="form-check-label" for="permission-checkbox">
                    {{$role->name}}
                  </label>
                </div>

              @endforeach

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
              >Close
              </button>
              <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{--  End Assign Roles Modal--}}
  @else
    <h4 class="text-center text-secondary">You done have permission to view user accounts</h4>

  @endcan
</div>
