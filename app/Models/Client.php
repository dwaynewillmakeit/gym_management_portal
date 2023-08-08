<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */

    public function progressReports(){

      return $this->hasMany(ProgressReport::class,'client_id','id');
    }
}
