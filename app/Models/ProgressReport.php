<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgressReport extends Model
{
  use HasFactory;

  use SoftDeletes;

  protected static function booted()
  {
    static::deleting(function ($progressReport) {
      $progressReport->deleted_by = auth()->id();
      $progressReport->save();
    });
  }


  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public function getDateForHumansAttribute()
  {
    return date('M d, Y',strtotime($this->date));
  }
}
