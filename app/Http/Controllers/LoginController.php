<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ilumminate\Support\Facades\Validation;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //This method will show the login page for the customer
    public function index() {
        return view('index');
    } 
    //This method will show the login form in the login
    public function login() {
        return view('auth.login');
    }
    //this method will be authenticate the login form 
    public function authenticate(Request $request) {
        $validated = $request->validate([
            'email'=>'required|email ',
            'password'=>'required'
        ]);
        if($validated->passes()) {
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
 
            } else {
                return redirect()->route('auth.login')->with('Either email or password is incorrect.');
            }
        } else {
            return redirect()->route('auth.login')->withInput()->withError($validated);
        }
    }
}
