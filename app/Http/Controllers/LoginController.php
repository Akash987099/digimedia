<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Logincontroller extends Controller
{
    
    public function adminLogin(){
        return view('admin.login');
    }

    public function adminLogins(Request $request){
        // dd($request->all());
        $email = $request->username;
        $password = $request->password;

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

             return response()->json(['status' => 'success']);
           
        }

        return response()->json(['status' => 'error']);

    }

    public function adminlogout(Request $request){

        Auth::guard('admin')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('adminLogin');

    }

}
