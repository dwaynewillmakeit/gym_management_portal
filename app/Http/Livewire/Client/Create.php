<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use Livewire\Component;

class Create extends Component
{
  protected $listeners = ['resetComponent'];

  public Client $client ;

  public string $clientName = '';
  public string $email = '';
  public string $startDate = '';
  public string $telephone = '';
  public string $dob = '';
  public string $emergencyContactNumber = '';
  public string $emergencyContactName = '';
  public string $street = '';
  public string $town = '';
  public string $selectedParish = 'Clarendon';
  public string $isOnDietPlan = 'no';
  public string $dietPlanDescription = '';
  public string $bodyType = "endomorph";
  public string $bmi = '';
  public string $bone = '';
  public string $muscle = '';
  public string $fat = '';
  public string $water = '';
  public string $workoutPlan = '';
  public string $personalTraining = '';

  public array $targetAreas = [];

  public array $majorBodyParts = [];

  public array $parishes = [];


  protected array $rules = [
    'client.name' => 'required|min:6',
    'client.email' => 'required|email|unique:App\Models\Client,email',
    'client.start_date' => 'required|date',
    'client.telephone' => 'required',
    'client.dob' => 'required|date',
    'client.emergency_contact_number' => 'required',
    'client.emergency_contact_name' => 'required',
    'client.street' => 'required',
    'client.town' => 'required',
    'client.parish' => 'required',
    'client.is_on_diet_plan' => 'required',
    'client.diet_plan_description'=>'required_if:client.is_on_diet_plan,1',
    'client.body_type' => 'required',
    'client.bmi' => 'required',
    'client.bone' => 'required',
    'client.muscle' => 'required',
    'client.fat' => 'required',
    'client.water' => 'required',
    'client.workout_plan' => 'required',
    'client.personal_training' => 'nullable',
    'targetAreas' => 'required',
  ];


   protected array $messages = [
     'client.diet_plan_description.required_if' => 'The diet plan description field must be completed if the client is on a diet plan',
     'targetAreas.required' => "Please select at least one target area"
   ];

  public function mount(Client $client): void
  {

    $this->client = $client;

    $this->clientName = '';

    if($this->client->body_type == null){
      $this->client->body_type = 'endomorph';
    }

    $this->startDate = date('Y-m-d');

    $this->targetAreas = array_map('trim',explode(",",$client->target_areas));


    $this->parishes = [
      'Clarendon',
      'Hanover',
      'Kingston',
      'Manchester',
      'Portland',
      'St. Andrew',
      'St. Ann',
      'St. Catherine',
      'St. Elizabeth',
      'St. James',
      'St. Mary',
      'St. Thomas',
      'Trelawny',
      'Westmoreland'
    ];

    sort($this->parishes);

    $this->selectedParish = $this->parishes[0];

    $this->majorBodyParts = [
      'Arms',
      "Back",
      "Chest",
      "Core",
      "Glutes",
      "Legs",
      "Shoulders"
    ];

  }

  public function render()
  {
    return view('livewire.client.create')->extends("layouts.app");
  }

  public function updated($propertyName)
  {

    $this->validateOnly($propertyName);

  }

  public function save()
  {

    $this->rules['client.email'] .= ',' . $this->client->id;

    $this->validate();

    $this->client->target_areas = implode(",",$this->targetAreas);

    $this->client->created_by = auth()->user()->id;

    $this->client->save();

    session()->flash("success","Client information stored successfully");

    return redirect()->route('clients.show',['client'=>$this->client->id]);


  }

  public function buildTargetAreaString(): string
  {

    $targetAreas = '';

    foreach ($this->targetAreas as $key => $targetArea) {
      $targetAreas .= $targetArea;

      if ($key != array_key_last($this->targetAreas)) {

        $targetAreas .= ", ";
      }
    }

    return $targetAreas;
  }



}
