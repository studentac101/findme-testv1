<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    public function incident($value='')
    {
      return $this->hasOne('App\Incident');
    }

    protected $fillable = ['first_name','middle_name','last_name','birthdate','gender','nationality','date_last_seen','skin_type','height','weight','medical_history','body_marks','top','bottom','description'];
    protected $hidden = ['lat','lng','imgurl'];

}
