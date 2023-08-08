<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\PaymentRecord;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{

  public int $totalClients = 0;
  public int $totalClientsThisMonth = 5;

  public int $numberOfPaymentsThisMonth = 6;

  public float $totalPaymentAmountThisMonth = 20000.00;

  public function mount()
  {
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    $this->totalClients = Client::count();

    $this->totalClientsThisMonth = Client::whereMonth('start_date', $currentMonth)
      ->whereYear('start_date', $currentYear)->count();

    $this->totalPaymentAmountThisMonth = PaymentRecord::whereMonth('date_paid', $currentMonth)
      ->whereYear('date_paid', $currentYear)->sum('amount');

    $this->numberOfPaymentsThisMonth = PaymentRecord::whereMonth('date_paid', $currentMonth)
      ->whereYear('date_paid', $currentYear)->count();

  }

  public function render()
  {
    return view('livewire.dashboard');
  }
}
