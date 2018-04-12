<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
  public function officers()
  {
    return $this->hasMany('App\Officer');
  }
  // public function petitioners()
  // {
  //   return $this->hasMany('App\Petitioner');
  // }
  public function incidents()
  {
    return $this->hasMany('App\Incident');
  }
  public function sightings()
  {
    return $this->hasMany('App\Sighting');
  }

    protected $fillable = [
      'name',
      'address'
    ];
}
