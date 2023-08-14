<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
  use WithPagination;

  public Client $client;

  public function mount(Client $client){

    $this->client = $client;
  }




  public function render()
  {
    return view('livewire.client.show')->extends("layouts.app");
  }
}
