<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
  use WithPagination;

  public string $clientName = '';
  protected string $paginationTheme = 'bootstrap';


  public function mount(){

  }

  public function updatingClientName(): void
  {
    $this->resetPage();
  }

  public function render()
  {
    $clients = Client::where('name','like','%'.$this->clientName.'%')->orderBy('name')->paginate(10);

    return view('livewire.client.all',['clients'=>$clients])->extends("layouts.app");
  }
}
