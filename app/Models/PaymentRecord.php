<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentRecord extends Model
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

  public function client(){

    return $this->belongsTo(Client::class,'client_id','id');
  }
}
