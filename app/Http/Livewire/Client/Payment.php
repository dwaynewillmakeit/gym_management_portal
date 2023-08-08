<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use App\Models\PaymentRecord;
use App\Models\ProgressReport;
use Livewire\Component;
use Livewire\WithPagination;

class Payment extends Component
{
  use WithPagination;

  protected string $paginationTheme = 'bootstrap';

  public Client $client;
  public PaymentRecord $paymentRecord;

  public function mount(Client $client,PaymentRecord $paymentRecord): void
  {

    $this->client = $client;
    $this->paymentRecord = $paymentRecord;

  }

  public function render()
  {
    $paymentRecords = PaymentRecord::where(['client_id'=>$this->client->id])
      ->orderBy('date_paid','desc')
      ->paginate(10,['*'],'paymentRecordPage');

    return view('livewire.client.payment',['paymentRecords'=>$paymentRecords]);
  }

  public function savePaymentRecord(){

    $this->validate();

    $this->paymentRecord->client_id = $this->client->id;

    $this->paymentRecord->created_by = auth()->user()->id;

    $this->paymentRecord->save();

    session()->flash("success","Payment Record Saved");

    return redirect()->route('clients.show',['client'=>$this->client->id]);

  }

  public function openAddEditPaymentModal(PaymentRecord $paymentRecord){
    $this->paymentRecord = $paymentRecord;
  }
  public function closeAddEditPaymentModal(): void
  {
//    $this->paymentRecord = new PaymentRecord();
  }


  protected array $rules = [
    'paymentRecord.date_paid'     => 'required|date',
    'paymentRecord.period_start'  => 'required|date',
    'paymentRecord.period_end'    => 'required|date',
    'paymentRecord.amount'        => 'required|numeric',
  ];
}
