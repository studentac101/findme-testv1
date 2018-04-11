<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Missing;
class MobileController extends Controller
{
  public function search()
  {

    $name="J";
    $missing = Missing::where('first_name',$name)->orWhere('last_name',$name)->get();
    dd($missing);
  }
}
