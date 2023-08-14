<div>
  <div class="card">
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <div class="text-end pe-5 mb-3">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                  data-bs-target="#addEditUserModal" wire:click="openAddEditRoleModal">
            Add Role
          </button>

        </div>

        <table class="table table-hover table-sm">
          <thead>
          <tr>
            <th>Name</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Action Buttons</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">

          @foreach($roles as $role)
            <tr>
              <td>
                {{$role->name}}
              </td>
              <td>
                {{Date('M d, Y',strtotime($role->created_at))}}
              </td>
              <td>
                {{Date('M d, Y',strtotime($role->updated_at))}}
              </td>
              <td>
                <button class="btn btn-primary btn-sm" data-bs-toggle='modal'
                        data-bs-target="#assignPermissionModal"
                        wire:click="openAssignPermissionModal({{$role}})">Permissions
                </button>
              </td>

            </tr>

          @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

  {{--  Add Edit Role Modal--}}
  <div class="modal fade" id="addEditUserModal" tabindex="-1" style="display: none;" aria-modal="true"
       role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Role</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveRole">
          <div class="modal-body">

            <div>
              <label for="add-role-name" class="form-label">Name</label>
              <input type="text" class="form-control" id="add-role-name" placeholder="Role Name" wire:model="role.name">
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
  {{--  Assign Permission Modal--}}
  <div class="modal fade" id="assignPermissionModal" tabindex="-1" style="display: none;" aria-modal="true"
       role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Role Permissions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="assignPermissions({{$role}})">
          <div class="modal-body">

            <div class="row">

              <div class="col-md-12">
                <div class="mb-3">
                  <label for="name" class="form-label">Role:</label>
                  <input type="text" class="form-control" wire:model.lazy="role.name" readonly/>
                </div>
              </div>
            </div>

            <h4 class="mt-5">Permissions</h4>
            <hr>
            @foreach($permissions as $permission)

              <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox"
                       value="{{$permission->name}}"
                       id="permission-checkbox"
                       wire:model="selectedPermissions"
                >

                <label class="form-check-label" for="permission-checkbox">
                  {{$permission->name}}
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
  {{--  End Assign Permission Modal--}}
</div>
