<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Missing;
class MobileController extends Controller
{
  public function search()
  {

    $missings = Missing::where('first_name', 'like','%J')->get();
    dd($missings);
  }
}
