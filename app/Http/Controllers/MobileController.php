<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Missing;
class MobileController extends Controller
{
  public function search()
  {
    $query = "J";
    $missings = Missing::where("first_name", "like","%{$query}%")->get();
    echo $missings;
  }
}
