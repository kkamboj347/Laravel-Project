<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Ilumminate\Support\Facades\Validation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



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
        $validated = Validator::make($request->all(),[
            'email'=>'required|email ',
            'password'=>'required'
        ]);
        if($validated->passes()) {
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
                return redirect()->route('tasks.index');
            } else {
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect.');
            }
        } else {
            return redirect()->route('auth.login')->withInput()->withError($validated);
        }
    }
// redirect to the register form page 
    public function register() {
        return view('auth.register');
    }

    //create a new user of register form 
    public function processRegister(Request $request) {
        $validated =  Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
            'email_verified_at'=>'required|same:email',
            'password'=>'required',
            'confirm_password'=>'required',
        ]);
        if($validated->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->email_verified_at = $request->email_verified_at;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('account.login')->with('success','You have registered Successfully!');
        } else {
            return redirect()->route('account.register')->withInput()->withErrors($validated);
        }
    }

    // user logout 
    public function logout() {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
