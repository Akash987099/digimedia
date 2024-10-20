<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebQuary;

class WebquaryController extends Controller
{
    
    public function quarysave(Request $request){

    //    dd($request->all());
       
       $data = [
        
        'name' => $request->name,
        'email' => $request->email,
        'peoject' => $request->peoject,
        'description' => $request->description,

       ];

       $WebQuary = WebQuary::create($data);

       if($WebQuary){
        return response()->json(['status' => 'success']);
       }

       return response()->json(['status' => 'error']);

      }

}
