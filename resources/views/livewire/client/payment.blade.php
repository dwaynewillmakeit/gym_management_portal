<div>
  <div class="card">
    <h5 class="card-header">Payments</h5>

    <div class="text-end pe-5 mb-3">
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
              data-bs-target="#addEditPaymentModal" wire:click="openAddEditPaymentModal">
        Record Payment
      </button>

    </div>

    <div class="table-responsive text-nowrap mb-5">
      <table class="table">
        <thead>
        <tr class="text-nowrap">
          <th>Date Paid</th>
          <th>Period Start</th>
          <th>Period End</th>
          <th>Amount</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($paymentRecords as $paymentRecord)
          <tr>
            <td>{{date('M d, Y',strtotime($paymentRecord->date_paid))}}</td>
            <td>{{date('M d, Y',strtotime($paymentRecord->period_start))}}</td>
            <td>{{date('M d, Y',strtotime($paymentRecord->period_end))}}</td>
            <td>${{$paymentRecord->amount}}</td>
            <td>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#addEditPaymentModal"
                      wire:click="openAddEditPaymentModal({{$paymentRecord->id}})">
                Edit
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center h3">No record found</td>

          </tr>
        @endforelse

        </tbody>
      </table>
    </div>
    {{$paymentRecords->links()}}
  </div>

  {{--  Add Edit Modal--}}
  <div class="modal fade" id="addEditPaymentModal" tabindex="-1" style="display: none;" aria-modal="true"
       role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Record Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close" wire:click="closeAddEditPaymentModal"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="savePaymentRecord">
            <div class="row  ">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Date Paid</label>
                  <input type="date" class="form-control" wire:model="paymentRecord.date_paid"/>
                  @error('paymentRecord.date_paid') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Period Start</label>
                  <input type="date" class="form-control" wire:model="paymentRecord.period_start"/>
                  @error('paymentRecord.period_start') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Period End</label>
                  <input type="date" class="form-control" wire:model="paymentRecord.period_end"/>
                  @error('paymentRecord.period_end') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Amount</label>
                  <input type="number" class="form-control" wire:model="paymentRecord.amount"
                  >
                  @error('paymentRecord.amount') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                  wire:click="closeAddEditPaymentModal">Close
          </button>
          <button class="btn btn-primary" wire:click="savePaymentRecord">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{--  End Add Edit Modal--}}
</div>

