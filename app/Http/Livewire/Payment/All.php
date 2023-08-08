<?php

namespace App\Http\Livewire\Payment;

use App\Models\PaymentRecord;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
  use WithPagination;
  protected string $paginationTheme = 'bootstrap';

  public function render()
  {
    $paymentRecords = PaymentRecord::
    orderBy('date_paid', 'desc')
      ->paginate(10, ['*'], 'paymentRecordPage');
    return view('livewire.payment.all', ['paymentRecords' => $paymentRecords]);
  }
}
