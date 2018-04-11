<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Missing;
class MobileController extends Controller
{
  public function search(Request $request)
  {

    $missings = Missing::where("first_name", "like","%{$request->query}%")->get();
    echo $missings;
    exit();
  }
}
