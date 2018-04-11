<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Missing;
class MobileController extends Controller
{
  public function search()
  {
    $search="J";
    $missings = Missing::where("first_name", "like","%{$search}%")->get();
    dd($missings);
  }
}
