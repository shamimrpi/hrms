<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(){
    	return view('login.login');
    }
    public function loginConfirm(Request $r){

    	
    	$data = [
    		'staff_id' => $r->staff_id,
    		'password'=> $r->password
    	];
    	
    	/* $data['password'] = Hash::make($data['password']);*/
    	if (Auth::attempt($data)) {
    		return redirect()->route('dashboard');
    	} else {
    		return redirect()->route('login')->withErrors(['Invalid Staff ID and password']);
    	}
    }
      public function logout(Request $request)
	    {
	    	Auth::logout();

	    	return redirect()->to('/');
	    }
}
