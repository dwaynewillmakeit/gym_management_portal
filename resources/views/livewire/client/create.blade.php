<div class="row">
  @if (session()->has('success'))
    <div class="alert alert-primary alert-dismissible m-3" role="alert">
      This is a primary dismissible alert — check it out!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
  @endif
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">

            <form id="" class="mb-3" wire:submit.prevent="save">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" wire:model="client.name" placeholder="Name">
                    @error('client.name') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="start-date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start-date" name="start_date" wire:model="client.start_date"
                           value="{{$startDate}}">
                    @error('client.start_date') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                           wire:model="client.telephone" placeholder="Telephone" >
                    @error('client.telephone') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" wire:model="client.dob" >
                    @error('client.dob') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                           wire:model="client.email" placeholder="Email">
                    @error('client.email') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="emergency-contact-number" class="form-label">Emergency Contact Number</label>
                    <input type="text" class="form-control" id="emergency-contact-number"
                           placeholder="Emergency Contact Number" wire:model="client.emergency_contact_number" >
                    @error('client.emergency_contact_number') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="emergency-contact-name" class="form-label">Emergency Contact Name</label>
                    <input type="text" class="form-control" id="emergency-contact-name"
                           placeholder="Emergency Contact Name" wire:model="client.emergency_contact_name" />
                    @error('client.emergency_contact_name') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" placeholder="Street" wire:model="client.street" >
                    @error('client.street') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="town" class="form-label">Town</label>
                    <input type="text" class="form-control" id="town" placeholder="Town" wire:model="client.town"  />
                    @error('client.town') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="parish" class="form-label">Parish</label>
                    <select type="text" class="form-control" id="parish" wire:model="client.parish">
                      @foreach($parishes as $parish )
                        <option>{{$parish}}</option>
                      @endforeach
                    </select>
                    @error('$client.parish') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <p class="form-label mt-2 mb-3">Is Client currently on a diet plan? </p>

                  <div class="mb-3 form-check form-check-inline">

                    <input type="radio" id="diet-plan-yes" wire:model="client.is_on_diet_plan" value="1">
                    <label for="diet-plan-yes" class="form-label">Yes</label>

                  </div>

                  <div class="mb-3 form-check form-check-inline">
                    <input type="radio" id="diet-plan-no" wire:model="client.is_on_diet_plan" value="0">
                    <label for="diet-plan-no" class="form-label">No</label>
                  </div>

                  @if($client->is_on_diet_plan)
                    <div class="mb-4">
                      <label class="form-label" for="diet-plan-description">Describe diet plan</label>
                      <textarea class="form-control " id="diet-plan-description" wire:model="client.diet_plan_description"></textarea>
                      @error('client.diet_plan_description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                  @endif

                </div>
              </div>

              <p class="form-label">Initial Measurements: </p>
              <div class="row">
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="bmi" class="form-label">BMI</label>
                    <input type="text" class="form-control" id="bmi" placeholder="BMI" wire:model="client.bmi" />
                    @error('client.bmi') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="bone" class="form-label">Bone</label>
                    <input type="text" class="form-control" id="bone" placeholder="Bone" wire:model="client.bone" />
                    @error('client.bone') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="muscle" class="form-label">Muscle</label>
                    <input type="text" class="form-control" id="muscle" placeholder="Muscle" wire:model="client.muscle" />
                    @error('client.muscle') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="fat" class="form-label">Fat</label>
                    <input type="text" class="form-control" id="fat" placeholder="Fat" wire:model="client.fat" />
                    @error('client.fat') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="water" class="form-label">Water</label>
                    <input type="text" class="form-control" id="water" placeholder="Water" wire:model="client.water" />
                    @error('client.water') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <p class="form-label">Body type: </p>

                  <div class="mb-3 form-check form-check-inline">

                    <input type="radio" id="body-type-endomorph" wire:model="client.body_type" value="endomorph">
                    <label for="body-type-endomorph" class="form-label">Endomorph</label>

                  </div>

                  <div class="mb-3 form-check form-check-inline">
                    <input type="radio" id="body-type-mesomorph" wire:model="client.body_type" value="mesomorph">
                    <label for="body-type-mesomorph" class="form-label">Mesomorph</label>
                  </div>

                  <div class="mb-3 form-check form-check-inline">
                    <input type="radio" id="body-type-ectomorph" wire:model="client.body_type" value="ecotomorph">
                    <label for="body-type-ectomorph" class="form-label">Ectomorph</label>
                  </div>


                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="workout-plan">
                  What type of workout plan should be implemented to help client meet there target?
                </label>
                <textarea class="form-control " id="workout-plan" wire:model="client.workout_plan"></textarea>
                @error('client.workout_plan') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div>
                <p class="form-label">
                  Target Areas:
                </p>
                <div class="row mb-5">
                  @foreach($majorBodyParts as $bodyPart)
                    <div class="col-sm-4 col-md-3">

                      <div class="form-check ">
                        <input class="form-check-input" type="checkbox" value="{{$bodyPart}}"
                               id="{{"checkbox-".$bodyPart}}" wire:model="targetAreas"/>
                        <label class="form-check-label" for="{{"checkbox-".$bodyPart}}">
                          {{$bodyPart}}
                        </label>

                      </div>
                    </div>
                  @endforeach
                    @error('targetAreas') <span class="error">{{ $message }}</span> @enderror

                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="ta-person-training">
                  Specific Workout Program (Personal Training)
                </label>
                <textarea class="form-control " id="ta-person-training" wire:model="client.personal_training"></textarea>
                @error('client.personal_training') <span class="error">{{ $message }}</span> @enderror
              </div>


              <button class="btn btn-primary d-grid w-100 mt-5">
                Submit
              </button>

              @if($errors->any())
               <p class="text-danger text-center font-bold mt-3">Failed to save Client Information. Please address all errors and resubmit</p>

                {{$errors}}
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

