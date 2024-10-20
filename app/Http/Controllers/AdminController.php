<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\WebQuary;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    
    public function index(){

        $WebQuary = WebQuary::count();
        $Feedback = Feedback::count();
        return view('admin.index' , compact('WebQuary' , 'Feedback'));
    }

}
