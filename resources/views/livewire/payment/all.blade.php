<div>
  @can('view payment records')
    <div class="table-responsive text-nowrap mb-5">
      <h3>Payments</h3>
      <table class="table">
        <thead>
        <tr class="text-nowrap">
          <th>Date Paid</th>
          <th>Client</th>
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
            <td>{{$paymentRecord->client->name}}</td>
            <td>{{date('M d, Y',strtotime($paymentRecord->period_start))}}</td>
            <td>{{date('M d, Y',strtotime($paymentRecord->period_end))}}</td>
            <td>${{$paymentRecord->amount}}</td>
            <td>

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
  @endcan
</div>
