<?php

namespace App\Http\Livewire\ProgressReport;

use App\Models\Client;
use App\Models\ProgressReport;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
  use WithPagination;

  public Client $client;
  public ProgressReport $progressReport;


  public int $selectedProgressReportId = 0;


  protected string $paginationTheme = 'bootstrap';

  public function mount(Client $client,ProgressReport $progressReport)
  {

    $this->client = $client;
    $this->progressReport = $progressReport;


  }

  public function render()
  {

    $progressReports = ProgressReport::where(['client_id'=>$this->client->id])
      ->orderBy('date','desc')
      ->paginate(10,['*'],'progressReportPage');

    return view('livewire.progress-report.show',['progressReports'=>$progressReports]);
  }


  public function save()
  {
    $this->validate();

    if (!$this->progressReport->client_id) {
      $this->progressReport->client_id = $this->client->id;
    }


    $this->progressReport->created_by = auth()->user()->id;
    $this->progressReport->save();


    session()->flash("success","progress report saved");
    return redirect()->route('clients.show',['client'=>$this->client->id]);
  }


  public function delete($id){

    $progressReport = ProgressReport::find($id);


    $progressReport->delete();

    session()->flash("success","progress report deleted");

    return redirect()->route('clients.show',['client'=>$this->client->id]);
//    dd($progressReport);
//    dd("Deleting..".$this->selectedProgressReportId);
  }



  public function openDeleteProgressReportModal($progressReportId): void
  {

    $this->selectedProgressReportId = $progressReportId;
  }

  public function openAddEditProgressReportModal(ProgressReport $progressReport): void
  {

//    dd($this->progressReport);
    $this->progressReport = $progressReport;

  }

  public function closeDeleteProgressReportModal(): void
  {

    $this->selectedProgressReportId = 0;

  }



  protected array $rules = [
    'progressReport.date' => 'required',
    'progressReport.weight' => 'required',
    'progressReport.waist' => 'required',
    'progressReport.thigh' => 'required',
    'progressReport.leg' => 'required',
    'progressReport.arm' => 'required',
    'progressReport.bust' => 'required',
  ];
}
