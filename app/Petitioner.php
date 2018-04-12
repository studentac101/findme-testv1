<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petitioner extends Model
{
    public function incidents()
    {
      return $this->hasMany('App\Incident');
    }

    // public function station()
    // {
    //   return $this->belongsTo('App\Station');
    // }

    protected $fillable = ['username','first_name','middle_name','last_name','gender','birthdate','nationality','address','contact_no','email'];
    protected $hidden = ['password','flag'];
}
