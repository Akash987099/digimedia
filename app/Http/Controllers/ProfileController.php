<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Admin;
use App\Models\Service;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    
    public function profile(){

        return view('admin.profile');

    }

    public function updateProfile(Request $request){

        // dd($request->all());

        $data = [

            'name' => $request->name,
            'email1' => $request->email1,
            'mobile' => $request->mobile,
            'address' => $request->address,

        ];

        $admin = Admin::where('id' , Auth::guard('admin')->user()->id)->update($data);

        if($admin){
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);

    }

    public function updateLogo(Request $request){

        // dd($request->all());
        // headerlogo
        // footerlogo

        $data = ['web_name' => $request->websitename];

        if ($request->hasFile('headerlogo')) {
            $document = $request->file('headerlogo');
            $originalName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $document->getClientOriginalExtension();
            $uniqueName = $originalName . '_' . uniqid() . '.' . $extension;
            $documentPath = $document->move('logo', $uniqueName , 'public');
            
            $data['header_logo'] = $documentPath;
        }

        if ($request->hasFile('footerlogo')) {
            $document = $request->file('footerlogo');
            $originalName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $document->getClientOriginalExtension();
            $uniqueName = $originalName . '_' . uniqid() . '.' . $extension;
            $documentPath = $document->move('logo', $uniqueName , 'public');
            
            $data['footer_logo'] = $documentPath;
        }

        $admin = Admin::where('id' , Auth::guard('admin')->user()->id)->update($data);

        if($admin){
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);

    }

}
