<div>
  <div class="card">
    <div class="card-body">
      <div>

        @can('view clients')
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Client" aria-label="Search Client"
                   aria-describedby="search-button" wire:model.debounce.500ms="clientName">
            <button class="btn btn-outline-primary" type="button" id="search-button">Search</button>
          </div>
      </div>
      <div class="table-responsive text-nowrap">

        <table class="table table-hover table-sm">
          <thead>
          <tr>
            <th>Name</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Emergency Contact</th>
            <th>Emergency Contact #</th>
            <th> Action Buttons</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach($clients as $client)
            <tr>

              <td>
                {{$client->name }}
              </td>
              <td>
                {{$client->telephone }}
              </td>
              <td>
                {{$client->email }}
              </td>
              <td>
                {{$client->emergency_contact_name }}
              </td>
              <td>
                {{$client->emergency_contact_number }}
              </td>
              <td>
                <a href="{{route('clients.show',['client'=>$client->id])}}" class="btn btn-icon btn-primary ">
                  <span class="tf-icons bx bx-clipboard"></span>
                </a>
                <a href="{{route('clients.edit',['client'=>$client->id])}}" class="btn btn-icon btn-warning">
                  <span class="tf-icons bx bx-edit"></span>
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    {{ $clients->links() }}
    @else
      <h4 class="text-center text-secondary">You done have permission to view Clients' records</h4>
    @endcan
  </div>


</div>
