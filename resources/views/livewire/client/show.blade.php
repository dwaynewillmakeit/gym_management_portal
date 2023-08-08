<div>
  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title mb-5">{{$client->name}}</h5>

            </div>
            <div class="col">
              <a href="{{route('clients.edit',['client'=>$client->id])}}"
                 class="btn btn-sm btn-outline-primary float-end">Edit</a>

            </div>
          </div>

          <div class="card-subtitle text-muted mb-3">
            <div class="me-2">
              <small class="text-muted d-block mb-1">DOB</small>
              <h6 class="mb-0">{{$client->dob}}</h6>
            </div>
            <hr>
            <div class="me-2">
              <small class="text-muted d-block mb-1">Telephone</small>
              <h6 class="mb-0">{{$client->telephone}}</h6>
            </div>
            <hr>
            <div class="me-2">
              <small class="text-muted d-block mb-1">Address</small>
              <h6 class="mb-0">{{$client->street}}, {{$client->town}}, {{$client->parish}}</h6>
            </div>
            <hr>
            <div class="me-2">
              <small class="text-muted d-block mb-1">Email</small>
              <h6 class="mb-0">{{$client->email}}</h6>
            </div>
            <hr>
            <div class="me-2">
              <small class="text-muted d-block mb-1">Emergency Contact</small>
              <h6 class="mb-0">{{$client->emergency_contact_name}}</h6>
              <h6 class="mb-0">{{$client->emergency_contact_number}}</h6>
            </div>
            <hr>
            <div class="me-2">
              <small class="text-muted d-block mb-1">Start Date</small>
              <h6 class="mb-0">{{$client->start_date}}</h6>
            </div>

          </div>


        </div>
      </div>
    </div>

    <div class="col">
      <div class="card mb-4">
        <div class="card-body">

          <hr>

          <div class="row">
            <h5>Initial Measurements</h5>

            <div class="col-md-3">
              <div class="me-2">
                <small class="text-muted d-block mb-1">BMI</small>
                <h6 class="mb-0">{{$client->bmi}}</h6>
              </div>

            </div>
            <div class="col-md-3">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Bone</small>
                <h6 class="mb-0">{{$client->bone}}</h6>
              </div>

            </div>

            <div class="col-md-3">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Muscle</small>
                <h6 class="mb-0">{{$client->muscle}}</h6>
              </div>

            </div>

            <div class="col-md-3">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Fat</small>
                <h6 class="mb-0">{{$client->fat}}</h6>
              </div>

            </div>

            <div class="col-md-3">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Water</small>
                <h6 class="mb-0">{{$client->water}}</h6>
              </div>

            </div>

          </div>

          <hr>
          <div class="me-2">
            <small class="text-muted d-block mb-1">Is on Diet Plan</small>
            <h6 class="mb-0">{{$client->is_on_diet_plan?"Yes":"No"}}</h6>
          </div>
          <br>
          @if($client->is_on_diet_plan)
            <div class="me-2">
              <small class="text-muted d-block mb-1">Diet Plan</small>
              <h6 class="mb-0">{{$client->diet_plan_description}}</h6>
            </div>
          @endif
          <hr>
          <div class="me-2">
            <small class="text-muted d-block mb-1">Body Type</small>
            <h6 class="mb-0">{{$client->body_type}}</h6>
          </div>
          <hr>
          <div class="me-2">
            <small class="text-muted d-block mb-1">Workout plan</small>
            <h6 class="mb-0">{{$client->workout_plan}}</h6>
          </div>
          <hr>
          <div class="me-2">
            <small class="text-muted d-block mb-1">Target Areas</small>
            <h6 class="mb-0">{{$client->target_areas}}</h6>
          </div>
          <hr>
          <div class="me-2">
            <small class="text-muted d-block mb-1">Personal Training</small>
            <h6 class="mb-0">{{$client->personal_training}}</h6>
          </div>

        </div>
      </div>
    </div>

  </div>

  @livewire('progress-report.show',['client'=>$client])
  @livewire('client.payment',['client'=>$client])
</div>
