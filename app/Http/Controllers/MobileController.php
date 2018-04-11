<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Missing;
class MobileController extends Controller
{
  public function search()
  {

    $name="J";
    $missings = Missing::where('name', 'like', $name)->get();
    dd($missings);
  }
}
