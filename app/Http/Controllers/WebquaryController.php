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

      public function quary(Request $request){

        return view('admin.web_quary');

      }

      public function QuaryAjax(Request $request){

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
        
        $data = WebQuary::query();
        
        if($searchValue != NULL){
            // $data->where('description' , 'like', '%' . $searchValue . '%')
            //      ->orwhere('name' , 'like', '%' . $searchValue . '%')
            //      ->orwhere('pincode' , 'like', '%' . $searchValue . '%');
        }

        $totalRecordswithFilter = $data->count();
        $totalRecords = $totalRecordswithFilter;
        $list = $data->skip($start)->take($length)->orderby('id' , 'desc')->get();

        // $data = admin::all();
          
        $data_arr = array();
        foreach($list as $key => $record){
 
            $id = $record->id;
           
            $action  = '&nbsp;<a href="javascript:void(0);" class="view btn btn-primary btn-sm" data-id="'.$id.'">view</a>';
            $action .= '&nbsp;<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" data-id="'.$id.'">Delete</a>';

            $data_arr[] = array(
              "id" => ++$start,
              'name' => $record->name,
              'email'  => $record->email,
              'project' => $record->project,
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

}
