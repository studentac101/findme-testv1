<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sighting extends Model
{
    public function incident()
    {
      return $this->belongsTo('App\Incident');
    }
    public function station()
    {
      return $this->belongsTo('App\Station');
    }
}
