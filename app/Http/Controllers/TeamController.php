<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Admin;
use App\Models\Service;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    
    public function team(){

        $page = Page::all();

        return view('admin.team' , compact('page'));
        
    }

    public function TeamAdd(Request $request){

    
        $data = [

            'admin_id' => Auth::guard('admin')->user()->id,
            'page_id'  => $request->pageid,
            'name'     => $request->name,
            'designation' => $request->designation,
            'experiance'  => $request->experiance,

        ];

        if ($request->hasFile('image')) {
            $document = $request->file('image');
            $originalName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $document->getClientOriginalExtension();
            $uniqueName = $originalName . '_' . uniqid() . '.' . $extension;
            $documentPath = $document->move('team', $uniqueName , 'public');
            
            $data['image'] = $documentPath;
        }

        $page = Team::create($data);
      
        if($page){
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);

    }

    public function teamAjax(Request $request){

        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search_arr = $request->get('search');
        $searchValue = $search_arr['value'];
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $columnIndex = $columnIndex_arr[0]['column']; 
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        
        $data = Team::join('pages' , 'team_master.page_id' , 'pages.id')->select('team_master.*' , 'pages.slug as slug');
        
        if($searchValue != NULL){
            // $data->where('description' , 'like', '%' . $searchValue . '%')
            //      ->orwhere('name' , 'like', '%' . $searchValue . '%')
            //      ->orwhere('pincode' , 'like', '%' . $searchValue . '%');
        }

        $totalRecordswithFilter = $data->count();
        $totalRecords = $totalRecordswithFilter;
        $list = $data->skip($start)->take($length)->orderby('page_id' , 'asc')->get();

        // $data = admin::all();
          
        $data_arr = array();
        foreach($list as $key => $record){
 
            $id = $record->id;
           
            $action  = '&nbsp;<a href="javascript:void(0);" class="edit btn btn-primary btn-sm" data-id="'.$id.'">Edit</a>';
            $action .= '&nbsp;<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" data-id="'.$id.'">Delete</a>';

            $data_arr[] = array(
              "id" => ++$start,
              'name' => $record->name,
              'slug'  => $record->slug,
              'designation' => $record->designation,
              'experiance'  => $record->experiance,
              "action" => $action,
            );

        }

        $response = array(
            "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr,
        );

        // dd($response);
        echo json_encode($response);

    }

    public function teamDelete(Request $request){

        $delete = $request->id;
        $update = $request->update;

        if($delete){
            $data =  Team::where('id' , $delete)->delete();
        }

        if($update){
            $data =  Team::where('id' , $update)->first();
        }

        if($data){
            return response()->json(['status' => 'success' , 'data' => $data]);
        }

        return response()->json(['status' => 'error']);

    }

    public function teamUpdate(Request $request){

        $data = [

            'admin_id' => Auth::guard('admin')->user()->id,
            'page_id'  => $request->pageid,
            'name'     => $request->name,
            'designation' => $request->designation,
            'experiance'  => $request->experiance,

        ];

        if ($request->hasFile('image')) {
            $document = $request->file('image');
            $originalName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $document->getClientOriginalExtension();
            $uniqueName = $originalName . '_' . uniqid() . '.' . $extension;
            $documentPath = $document->move('team', $uniqueName , 'public');
            
            $data['image'] = $documentPath;
        }

        $page = Team::where('id' , $request->updateid)->update($data);
      
        if($page){
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);

    }

}
