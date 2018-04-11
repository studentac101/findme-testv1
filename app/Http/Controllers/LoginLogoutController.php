<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;

class LoginLogoutController extends Controller
{
   public function doLogin(Request $request)
   {
     $this->validate($request,[
       'username'=>'required|exists:officers',
       'password'=>'required',
     ]);

     $credentials = $request->only(['username','password']);
     $loggedIn = Auth::guard('officer')->attempt($credentials);

     // correct credentials
     if($loggedIn){
                        // if the credentials are correct it would still check if the user is still active or was deactivated

                         if(Auth::guard('officer')->user()->status==1){
                           return redirect('/officers');
                         }
                         else {
                           Auth::guard('officer')->logout();
                           Session::flush();
                           return redirect('/');
                         }
     }
     // incorrect credentials
     else {
       return redirect('/');
     }
   }

   public function doLogout()
   {
     Auth::guard('officer')->logout();
     Session::flush();
     return redirect('/');
   }
}
