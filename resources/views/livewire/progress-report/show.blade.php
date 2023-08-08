<div class="mb-5">
  <div class="card">
    <h5 class="card-header">Progress Report</h5>

    <div class="text-end pe-5 mb-3">
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
              data-bs-target="#addEditProgressReportModal"
              wire:click="openAddEditProgressReportModal">
        Add Progress
      </button>

    </div>

    <div class="table-responsive text-nowrap mb-5">
      <table class="table">
        <thead>
        <tr class="text-nowrap">
          <th>Date</th>
          <th>Weight</th>
          <th>Waist</th>
          <th>Thigh</th>
          <th>Leg</th>
          <th>Arm</th>
          <th>Bust</th>
          <th></th>
        </tr>
        </thead>
        <tbody>

        @forelse($progressReports as $progressReport)

          <tr>
            <td>{{$progressReport->date_for_humans}}</td>
            <td>{{$progressReport->weight}}</td>
            <td>{{$progressReport->waist}}</td>
            <td>{{$progressReport->thigh}}</td>
            <td>{{$progressReport->leg}}</td>
            <td>{{$progressReport->arm}}</td>
            <td>{{$progressReport->bust}}</td>
            <td>
              <button type="button" class="btn btn-primary"
                      data-bs-toggle="modal" data-bs-target="#addEditProgressReportModal"
                      wire:click="openAddEditProgressReportModal({{$progressReport->id}})">
                Edit
              </button>

              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                      data-bs-target="#deleteProgressReportModal"
                      wire:key="delete-progress-report-{{$progressReport->id}}"
                      wire:click="openDeleteProgressReportModal({{ $progressReport->id }})">
                Delete
              </button>

            </td>
          </tr>
        @empty
          <tr >
            <td colspan="8" class="text-center h3">No record found</td>

          </tr>
        @endforelse

        </tbody>
      </table>
      <p>{{ $progressReports->links() }}</p>
    </div>
  </div>

  {{--  Delete Modal--}}
  <div class="modal fade" id="deleteProgressReportModal" tabindex="-1" aria-hidden="true" style="display: none;"
       wire:ignore.self>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Delete Progress Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                  wire:click="closeDeleteProgressReportModal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this progress report?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                  wire:click="closeDeleteProgressReportModal">Cancel
          </button>
          <button type="button" class="btn btn-danger" wire:click="delete({{$selectedProgressReportId}})">Delete
          </button>
        </div>
      </div>
    </div>
  </div>
  {{--  End Delete Modal--}}

  {{--  Add Edit Modal--}}
  <div class="modal fade" id="addEditProgressReportModal" tabindex="-1" style="display: none;" aria-modal="true"
       role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="save">

            <div class="row  ">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Date</label>
                  <input type="date" class="form-control" wire:model="progressReport.date"
                         >
                  @error('progressReport.date') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Weight</label>
                  <input type="number" class="form-control" wire:model="progressReport.weight"
                         placeholder="Weight">
                  @error('progressReport.weight') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Waist</label>
                  <input type="number" class="form-control" wire:model="progressReport.waist"
                         placeholder="Waist">
                  @error('progressReport.waist') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Thigh</label>
                  <input type="number" class="form-control" wire:model="progressReport.thigh"
                         placeholder="Thigh">
                  @error('progressReport.thigh') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Leg</label>
                  <input type="number" class="form-control" wire:model="progressReport.leg" placeholder="Leg">
                  @error('progressReport.leg') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Arm</label>
                  <input type="number" class="form-control" wire:model="progressReport.arm" placeholder="Arm">
                  @error('progressReport.arm') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Bust</label>
                  <input type="number" class="form-control" wire:model="progressReport.bust" placeholder="Bust">
                  @error('progressReport.bust') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" wire:click="save">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{--  End Add Edit Modal--}}
</div>
