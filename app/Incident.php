<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    public function station()
    {
      return $this->belongsTo('App\Station');
    }
    public function missing()
    {
      return $this->belongsTo('App\Missing');
    }
    public function petitioner()
    {
      return $this->belongsTo('App\Petitioner');
    }
    public function officer()
    {
      return $this->belongsTo('App\Officer');
    }
    public function sightings()
    {
      return  $this->hasMany('App\Sighting');
    }
    protected $fillable = [
      'petitioner_id',
      'missing_id',
      'officer_id',
      'station_id',
    ];
}
