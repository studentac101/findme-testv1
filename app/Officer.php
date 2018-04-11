<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Officer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public function station()
     {
       return $this->belongsTo('App\station');
     }

     public function incidents()
     {
       return $this->hasMany('App\Incidents');
     }

    protected $fillable = [
        'username', 'first_name', 'middle_name', 'last_name', 'gender', 'birthdate', 'nationality', 'contact_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'avatar', 'station_id', 'email','remember_token',
    ];
}
