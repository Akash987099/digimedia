<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Rules\PasswordRule;
use Illuminate\Validation\Rule;
use DB;

class MenuController extends Controller
{

    public function subMenusAjax(Request $request){

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

        //$id = Auth::guard('admin')->user()->id;
        
        $data = Submenu::query();

        $data = Submenu::join('menus' , 'submenus.menu_id' , '=', 'menus.id')
                          ->select('submenus.*' , 'menus.name as menuname');

        if($searchValue != NULL){
            $data->where('name' , 'like', '%' . $searchValue . '%');
        }

        $totalRecordswithFilter = $data->count();
        $totalRecords = $totalRecordswithFilter;
        $list = $data->skip($start)->take($length)->orderby('name' , 'asc')->get();

        $data_arr = array();
        foreach($list as $key => $record){
 
            $id = $record->id;
           
            $action  = '&nbsp;<a href="javascript:void(0);"  class="edit btn btn-primary btn-sm" data-id="'.$id.'">Edit</a>';
            $action .= '&nbsp;<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" data-id="'.$id.'">Delete</a>';

            $data_arr[] = array(
              "id" => ++$start,
              'name'  => $record->name,
              'menuname' => $record->menuname,
              'slug' => $record->slug,
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

    public function getSubMenus(Request $request){
        // dd($request->all());
        $id = $request->id;

        $data = Submenu::where('menu_id' , $id)->get();

         return response()->json(['data' => $data]);
    }

    public function SubMenusave(Request $request){
         //dd($request->all()); 

        $rules = [ 
            'menu_name' => 'required',
            'submenu_name' => 'required|unique:submenus,name,',
            'submenu_slug' => 'required',
         ];

    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error' , 'message' => $validator->errors()]);
        }

        $insert = Submenu::insert(['menu_id' => $request->menu_name , 'name' => $request->submenu_name,'slug' => $request->submenu_slug]);

        if($insert){
            return  response()->json(['status' => 'success']);
        }

        return  response()->json(['status' => 'error']);

    }

    public function pages(){

        $menu = Menu::all();
        $submenu = Submenu::all();

        return view('admin.page' , compact('menu' , 'submenu'));
    }

    public function pagesAjax(Request $request){
        
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
        
        $data = DB::table('pages')
                ->leftJoin('submenus', 'pages.submenu_id', '=', 'submenus.id')
                ->leftJoin('menus', 'submenus.menu_id', '=', 'menus.id')
                ->select(
                    'pages.id as page_id', 
                    'pages.title as page_title',
                    'pages.slug as page_slug', 
                    'submenus.name as submenu_name', 
                    'menus.name as menu_name'
                );
        
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
 
            $id = $record->page_id;
           
            $action  = '&nbsp;<a href="javascript:void(0);" class="updatetitle btn btn-primary btn-sm" data-id="'.$id.'">Edit Page Title</a>';

            $action  .= '&nbsp;<a href="'.route('admin.page-details', ['id' => $id]).'" class="btn btn-primary btn-sm" data-id="'.$id.'">Edit Page</a>';
            
            $action .= '&nbsp;<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" data-id="'.$id.'">Delete</a>';

            $data_arr[] = array(
              "id" => ++$start,
              'menu_name' => $record->menu_name,
              'submenu_name'  => $record->submenu_name,
              'page_slug' => $record->page_slug,
              'page_title' => $record->page_title,
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

    

    public function pageDetails($id){

        return view('admin.pagedetails',compact('id'));
    }

    public function pagesSave(Request $request)
    {
        $validatedData = $request->validate([
            'menu_name' => 'required',
            // 'submenu' => 'required',
            // 'page_slug' => 'required',
            // 'page_title' => 'required',
        ]);

        
        $pageData = [
            'menu_id' => $validatedData['menu_name'],
            'submenu_id' => $request->submenu,
            'title' => $request->page_title,
            'slug' => $request->page_slug,
        ];
        
        $pageId = DB::table('pages')->insertGetId($pageData);

        if ($pageId) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        }
    }

    public function pageUpdate1(Request $request)
    {
        // $validatedData = $request->validate([
        //    'page_title' => 'required',
        // ]);

        $pageid = $request->pageid;

        
        $pageData = [
            //'menu_id' => $validatedData['menu_name'],
            'title' => $request->page_title,
            'content' => $request->page_content,
            'page_title_2' => $request->page_title_2,
            'page_content_2'=> $request->page_content_2,
            'page_title_3' => $request->page_title_3,
            'page_content_3'=> $request->page_content_3,
            'page_title_4' => $request->page_title_4,
            'page_content_4'=> $request->page_content_4,
            'page_title_5' =>$request->page_title_5,
            'page_content_5' => $request->page_content_5,
            'video_link' => $request->page_video_1,
            'updated_at' => now(),
        ];

        $path = public_path('files/docs');

        if ($request->hasFile('page_image1')) {
            $pageImageFile = $request->file('page_image1');
            $pageImageFilename = pathinfo($pageImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $pageImageFile->getClientOriginalExtension();
            $pageImageFile->move($path, $pageImageFilename);
            $pageData['image'] = $pageImageFilename;
        }

        if ($request->hasFile('page_image_5')) {
            $pageImageFile5 = $request->file('page_image_5');
            $pageImageFilename5 = pathinfo($pageImageFile5->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $pageImageFile5->getClientOriginalExtension();
            $pageImageFile5->move($path, $pageImageFilename5);
            $pageData['page_image_5'] = $pageImageFilename5;
        }

        $updated = DB::table('pages')
                ->where('id', $pageid)
                ->update($pageData);
        
        if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        }
    }

    public function pageUpdate2(Request $request)
    {
       
        // $validatedData = $request->validate([
        //    'page_title' => 'required',
        // ]);

        $pageid = $request->pageid;

        
        $pageData = [
            
                        'banner1_title' => $request->banner1_title,
                        'banner1_content' => $request->banner1_content,
                        'banner2_title' => $request->banner2_title,
                        'banner2_content' => $request->banner2_content,
                        'updated_at' => now(),
        ];

        $path = public_path('files/docs');

        if ($request->hasFile('banner1_file')) {
            $banner1File = $request->file('banner1_file');
            $banner1Filename = pathinfo($banner1File->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $banner1File->getClientOriginalExtension();
            $banner1File->move($path, $banner1Filename);
            $pageData['banner1_file'] = $banner1Filename;
        }
    
        
        if ($request->hasFile('banner2_file')) {
            $banner2File = $request->file('banner2_file');
            $banner2Filename = pathinfo($banner2File->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $banner2File->getClientOriginalExtension();
            $banner2File->move($path, $banner2Filename);
            $pageData['banner2_file'] = $banner2Filename;
        }

        $updated = DB::table('pages')
                ->where('id', $pageid)
                ->update($pageData);
        
        if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        }
    }

    public function pageUpdate3(Request $request)
{
    // Validate the request data if needed
    // $validatedData = $request->validate([
    //    'marquee_content' => 'required',
    // ]);

    $pageid = $request->pageid;

    $pageData = [
        'marquee_content' => $request->marquee_content,
        'updated_at' => now(),
    ];

    $path = public_path('files/docs');
    
    // Handle multiple file uploads
    if ($request->hasFile('galleryimage')) {
        foreach ($request->file('galleryimage') as $galleryFile) {
            $galleryFilename = pathinfo($galleryFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $galleryFile->getClientOriginalExtension();
            $galleryFile->move($path, $galleryFilename);
            
            DB::table('gallery_tbl')->insert([
                'page_id' => $pageid,
                'file_name' => $galleryFilename,
                'path' => $galleryFilename,
                'status' => 1,
            ]);
        }
    }
    //If Form Contain Patner Images
    if ($request->hasFile('partnerimage')){
        foreach ($request->file('partnerimage') as $partnerFile) {
            $partnerFilename = pathinfo($partnerFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $partnerFile->getClientOriginalExtension();
            $partnerFile->move($path, $partnerFilename);
            
            DB::table('gallery_tbl')->insert([
                'page_id' => $pageid,
                'file_name' => $partnerFilename,
                'path' => $partnerFilename,
                'status' => 2,
            ]);
        }
    }
    

    // Update the page data
    $updated = DB::table('pages')
            ->where('id', $pageid)
            ->update($pageData);
    
    if ($updated) {
        return response()->json(['status' => true, 'msg' => 'Saved successfully']);
    } else {
        return response()->json(['status' => false, 'msg' => 'Failed to save data']);
    }
}

public function pageUpdate4(Request $request)
    {
        

        $pageid = $request->pageid;

        
        $pageData = [
            //'menu_id' => $validatedData['menu_name'],
            'section_title' => $request->section_title,
            'section_content' => $request->section_content,
            'floating_section_content' =>$request->floating_section_content,
            'timeline_section_content' => $request->timeline_section_content,
            'updated_at' => now(),
        ];

        $path = public_path('files/docs');

        if ($request->hasFile('section_image')) {
            $pageImageFile = $request->file('section_image');
            $pageImageFilename = pathinfo($pageImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $pageImageFile->getClientOriginalExtension();
            $pageImageFile->move($path, $pageImageFilename);
            $pageData['section_image'] = $pageImageFilename;
        }

        

        $updated = DB::table('pages')
                ->where('id', $pageid)
                ->update($pageData);
        
        if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        }
    }

    public function pageUpdate5(Request $request)
{
    $pageid = $request->pageid;

    $pageData = [
        'convention_title' => $request->convention_title,
        'convention_subtitle' => $request->convention_subtitle,
        'convention_content' => $request->convention_content,
        'updated_at' => now(),
    ];

    $path = public_path('files/docs');
    
    $updated = DB::table('pages')
            ->where('id', $pageid)
            ->update($pageData);

    

            if ($request->has('profile_name')) {
                foreach ($request->profile_name as $index => $name) {
                    if (!empty($name)) { // Check if the profile name is not empty
                        $profileData = [
                            'page_id' => $pageid,
                            'name' => $name,
                            'content' => $request->profile_content[$index] ?? null,
                            'address' => $request->profile_add[$index] ?? null,
                            'year' => $request->profile_year[$index] ?? null,
                            'status' => 1,
                            'created_at' => now(),
                        ];
            
                        if ($request->hasFile('profile_image.' . $index)) {
                            $profileImageFile = $request->file('profile_image')[$index];
                            $profileImageFilename = pathinfo($profileImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
                            $profileImageFile->move($path, $profileImageFilename);
                            $profileData['image_name'] = $profileImageFilename;
                        }
                        
                        DB::table('profile_tbl')->insert($profileData);
                    }
                }
            }
            
            if ($request->has('convention_name')) {
                foreach ($request->convention_name as $index => $name) {
                    if (!empty($name)) { // Check if the convention name is not empty
                        $conventionData = [
                            'page_id' => $pageid,
                            'name' => $name,
                            'address' => $request->convention_add[$index] ?? null,
                            'year' => $request->convention_year[$index] ?? null,
                            'status' => 2,
                            'created_at' => now(),
                        ];
            
                        if ($request->hasFile('convention_image.' . $index)) {
                            $conventionImageFile = $request->file('convention_image')[$index];
                            $conventionImageFilename = pathinfo($conventionImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $conventionImageFile->getClientOriginalExtension();
                            $conventionImageFile->move($path, $conventionImageFilename);
                            $conventionData['image_name'] = $conventionImageFilename;
                        }
                        
                        DB::table('profile_tbl')->insert($conventionData);
                    }
                }
            }
    
    if ($updated) {
        return response()->json(['status' => true, 'msg' => 'Saved successfully']);
    } else {
        return response()->json(['status' => false, 'msg' => 'Failed to save data']);
    }
}


    public function pageUpdate5Old(Request $request)
    {
        

        $pageid = $request->pageid;

        
        $pageData = [
            //'menu_id' => $validatedData['menu_name'],
            'convention_title' => $request->convention_title,
            'convention_subtitle' => $request->convention_subtitle,
            'convention_content' => $request->convention_content,
            'updated_at' => now(),
        ];

        $path = public_path('files/docs');

        if ($request->hasFile('convention_image')) {
            $pageImageFile = $request->file('convention_image');
            $pageImageFilename = pathinfo($pageImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $pageImageFile->getClientOriginalExtension();
            $pageImageFile->move($path, $pageImageFilename);
            $pageData['convention_image'] = $pageImageFilename;
        }
        
        $updated = DB::table('pages')
                ->where('id', $pageid)
                ->update($pageData);

        if ($request->has('profile_name')) {
            foreach ($request->profile_name as $index => $name) {
                $profileData = [
                    'page_id' => $pageid,
                    'name' => $name,
                    'content' => $request->profile_content[$index] ?? null,
                    'address' => $request->profile_add[$index] ?? null,
                    'year' => $request->profile_year[$index] ?? null,
                    'status' => 1,
                    'created_at' => now(),
                ];
    
                if ($request->hasFile('profile_image.' . $index)) {
                    $profileImageFile = $request->file('profile_image.' . $index);
                    $profileImageFilename = pathinfo($profileImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
                    $profileImageFile->move($path, $profileImageFilename);
                    $profileData['image_name'] = $profileImageFilename;
                }
                
                DB::table('profile_tbl')->insert($profileData);
            }
        }
        
        if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        }
    }

    public function pageUpdate6(Request $request)
    {
        $pageid = $request->pageid;

        $pageData = [
            'profile_title' => $request->profile_title,
            'profile_subtitle' => $request->profile_subtitle,
            'updated_at' => now(),
        ];

        $path = public_path('files/docs');

        if ($request->hasFile('profile_page_banner')) {
            $pageImageFile = $request->file('profile_page_banner');
            $pageImageFilename = pathinfo($pageImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $pageImageFile->getClientOriginalExtension();
            $pageImageFile->move($path, $pageImageFilename);
            $pageData['profile_page_banner'] = $pageImageFilename;
        }
        
        $updated = DB::table('pages')
                ->where('id', $pageid)
                ->update($pageData);
                
                if ($request->has('profile_name')) {
                    foreach ($request->profile_name as $index => $name) {
                        if (!empty($name)) { 
                            $profileData = [
                                'page_id' => $pageid,
                                'profile_name' => $name,
                                'profile_designation' => $request->profile_designation[$index] ?? null,
                                'profile_phone' => $request->profile_phone[$index] ?? null,
                                'profile_mobile' => $request->profile_mobile[$index] ?? null,
                                'profile_email' => $request->profile_email[$index] ?? null,
                                'profile_fax' => $request->profile_fax[$index] ?? null,
                                'organization' => $request->organization[$index] ?? null,
                                'profile_address' => $request->profile_address[$index] ?? null,
                                'profile_content' => $request->profile_content[$index] ?? null,
                                'status' => 1,
                                'created_at' => now(),
                            ];
                
                            if ($request->hasFile('profile_image.' . $index)) {
                                $profileImageFile = $request->file('profile_image')[$index];
                                $profileImageFilename = pathinfo($profileImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
                                $profileImageFile->move($path, $profileImageFilename);
                                $profileData['profile_image'] = $profileImageFilename;
                            }
                            
                            DB::table('member_profile_tbl')->insert($profileData);
                        }
                    }
                }
        
        if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        }
    }
    

    public function pageUpdate7(Request $request){

        // dd($request->all());
        
        $pageid = $request->pageid;

        $profile_title = $request->profile_title;
        $profile_name = $request->profile_name;
        $profile_designation = $request->profile_designation;
        $profile_email   = $request->profile_email;
        $profile_mobile  = $request->profile_mobile;

        if ($request->has('profile_name')) {
            foreach ($request->profile_name as $index => $name) {
                if (!empty($name)) { 
                    $profileData = [
                        'page_id' => $pageid,
                        'name' => $request->profile_name[$index] ?? null,
                        'company_name' => $request->profile_designation[$index] ?? null,
                        'email'   => $request->profile_email[$index] ?? null,
                        'mobile'  => $request->profile_mobile[$index] ?? null,
                        'created_at' => now(),
                    ];
                    
                    DB::table('page_tbl')->insert($profileData);
                }
            }
        }

        // if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        // } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        // }

    }

    public function pageUpdate8(Request $request){

        // dd($request->all());
        
        $pageid = $request->pageid;

        $page_link_title = $request->page_link_title;
        $link_page_banner = $request->link_page_banner;
        $page_link_content = $request->page_link_content;
        $page_link_subtitle = $request->page_link_subtitle;

        $pageData = [
            'link_title' => $page_link_title,
            'link_subtitle' => $page_link_subtitle,
            'link_page_content'=> $page_link_content,
            
            'updated_at' => now(),
        ];

        $path = public_path('files/docs');

        if ($request->hasFile('link_page_banner')) {
            $pageImageFile = $request->file('link_page_banner');
            $pageImageFilename = pathinfo($pageImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $pageImageFile->getClientOriginalExtension();
            $pageImageFile->move($path, $pageImageFilename);
            $pageData['link_page_banner'] = $pageImageFilename;
        }

        $updated = DB::table('pages')
                ->where('id', $pageid)
                ->update($pageData);

        
        $link_title   = $request->link_title;
        $link_file  = $request->link_file;

        if ($request->has('link_title')) {
            foreach ($request->link_title as $index => $title) {
                if (!empty($title)) { 
                    $profileData = [
                        'page_id' => $pageid,
                        'link_title' => $request->link_title[$index] ?? null,
                        'link' => $request->link[$index] ?? null,
                        'created_at' => now(),
                    ];

                    if ($request->hasFile('link_file.' . $index)) {
                        $profileImageFile = $request->file('link_file')[$index];
                        $profileImageFilename = pathinfo($profileImageFile->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $profileImageFile->getClientOriginalExtension();
                        $profileImageFile->move($path, $profileImageFilename);
                        $profileData['link_file'] = $profileImageFilename;
                    }
                    
                    DB::table('pages_link_tbl')->insert($profileData);
                }
            }
        }

        // if ($updated) {
            return response()->json(['status' => true, 'msg' => 'Saved successfully']);
        // } else {
            return response()->json(['status' => false, 'msg' => 'Failed to save data']);
        // }

    }


public function pagesdelete(Request $request){
    // dd($request->all());

    $delete = $request->id;
    $update = $request->update;

    if($update){
        $data = Page::where('id' , $update)->first();
    }elseif($delete){
        $data = Page::where('id' , $delete)->delete();
    }

    if($data){
        return  response()->json(['status' => 'success' , 'data' => $data]);
    }

    return  response()->json(['status' => 'error']);

}


    public function pagesSaveOld1(Request $request)
{
    
   
    $validatedData = $request->validate([
       
        'menu_name' => 'required'
    ]);
    
    $pageId = DB::table('concerns')->insertGetId([
        
        'menu_id' => $validatedData['menu_name'],
        'submenu_id' => $validatedData['submenu'],
        'title' => $validatedData['page_title'],
        'content' => $validatedData['page_content'],
        'video_link' => $validatedData['page_video_1'],
        'banner1_file' => $validatedData['banner1_file'],
        'banner1_title' => $validatedData['banner1_title'],
        'banner1_content' => $validatedData['banner1_content'],
        'banner2_file' => $validatedData['banner2_file'],
        'banner2_title' => $validatedData['banner2_title'],
        'banner2_content' => $validatedData['banner2_content'],
        'banner3_file' => $validatedData['banner3_file'],
        'banner3_title' => $validatedData['banner3_title'],
        'banner3_content' => $validatedData['banner3_content'],

        
        'marquee_content' => $validatedData['marquee_content'],

        
        'slug' => $validatedData['slug'],
        
    ]);

   

    // Handle file uploads
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $index => $file) {
            $path = public_path('user/docs');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $timestamp = time(); // Current timestamp
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '_' . $timestamp . '.' . $extension;
            
            
            if ($file->move($path, $filename)) {
                
                $docId = 1;
                DB::table('user_documents')->insert([
                    'user_id' => $user_id,
                    'concern_id' => $pageId,
                    'document_category_id' => $docId,
                    'name' => $originalName,
                    'path' => $filename,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } 
        }
    } 

    
    if($pageId){
        
       
        
    return response()->json(['status' => true, 'msg' => 'Saved successfully']);

    }
}

    public function pagesSaveOld(Request $request){
         

        $rules = [
            'menu_name' => 'required',
             
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error' , 'message' => $validator->errors()]);
        }

        $data = [

            'menu_id' => $request->menu_name,
            'submenu_id'      => $request->submenu,
            'title'   => $request->page_title,
            'content' => $request->page_content,
            'slug' => $request->page_slug,

        ];

        $insert = Page::insert($data);

        if($insert){
            return  response()->json(['status' => 'success']);
        }

        return  response()->json(['status' => 'error']);

    }
    

    //Menus 
    public function Menus(){
        return view('admin.menu');
     }

    public function MenusAjax(Request $request){

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

        //$id = Auth::guard('admin')->user()->id;
        
        $data = Menu::query();

        if($searchValue != NULL){
                $data ->where('name' , 'like', '%' . $searchValue . '%');
        }

        $totalRecordswithFilter = $data->count();
        $totalRecords = $totalRecordswithFilter;
        $list = $data->skip($start)->take($length)->orderby('name' , 'asc')->get();

        // $data = admin::all();
          
        $data_arr = array();
        foreach($list as $key => $record){
 
            $id = $record->id;
           
            $action  = '&nbsp;<a href="javascript:void(0);"  class="edit btn btn-primary btn-sm" data-id="'.$id.'">Edit</a>';
            $action .= '&nbsp;<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" data-id="'.$id.'">Delete</a>';

            $data_arr[] = array(
              "id" => ++$start,
              'name' => $record->name,
              'slug' => $record->slug,
              "action" => $action,
            );

        }

        $response = array(
            "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr,
        );

        
        echo json_encode($response);

    }

    public function Menusave(Request $request){
        

        $rules = [ 
            'menu' => 'required|unique:menus,name,',
            'slug' => 'required|unique:menus,slug,',
         ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error' , 'message' => $validator->errors()]);
        }

        $insert = Menu::create(['name' => $request->menu,'slug' => $request->slug]);

        if($insert){
            return  response()->json(['status' => 'success']);
        }

        return  response()->json(['status' => 'error']);

    }

    public function menuUpdate(Request $request){
        // dd($request->all());

        $id = $request->updateid;

        $rules = [
            'menu' => [
                'required',
                Rule::unique('menus', 'name')->ignore($id),
            ],
            'slug' => [
                'required',
                Rule::unique('menus', 'slug')->ignore($id),
            ],
        ];        

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error' , 'message' => $validator->errors()]);
        }

        $insert = Menu::where('id' , $request->updateid)->update(['name' => $request->menu,'slug' => $request->slug]);

        if($insert){
            return  response()->json(['status' => 'success']);
        }

        return  response()->json(['status' => 'error']);

    }

    public function getMenu(Request $request){
        // dd($request->all());
        $id = $request->id;

        $data = Menu::where('id' , $id)->first();

        // dd($data);

        if($data){
            return  response()->json(['status' => 'success', 'data' => $data]);
        }

        return  response()->json(['status' => 'error']);
    }
    
    public function subMenus(){
        $menus = Menu::all();
        return view('admin.submenu' , compact('menus'));
    }

    public function menudelete(Request $request){
        // dd($request->all());

        $id = $request->id;

        // $menus = Menu::where('');

        $Submenu = Submenu::where('menu_id' , $id)->first();
        $Page    = Page::where('menu_id' , $id)->first();

        if($Submenu || $Page){
            return response()->json(['status' => 'already']);
        }
       
        $menus = Menu::where('id' , $id)->delete();

        if ($menus) {
            return  response()->json(['status' => 'success']);
        }

    }

    public function submenu_delete(Request $request){
        // dd($request->all());

        $delete = $request->id;
        $update = $request->update;

        if($delete){
            $Page = Page::where('submenu_id' , $delete)->first();

            if($Page){
                return response()->json(['status' => 'already']);
            }

            $menus = Submenu::where('id' , $delete)->delete();

        }

        if($update){
            $menus = Submenu::where('id' , $update)->first();
        }

        if ($menus) {
            return  response()->json(['status' => 'success' , 'data' => $menus]);
        }

    }

    public function updatesubmenu(Request $request){
        // dd($request->all());

        $updateid = $request->updateid;
        $menu_name = $request->menu_name;
        $submenu_name = $request->submenu_name;
        $submenu_slug = $request->submenu_slug;

        $rules = [
            'submenu_name' => [
                'required',
                Rule::unique('submenus', 'name')->ignore($updateid),
            ],
            'submenu_slug' => [
                'required',
                Rule::unique('submenus', 'slug')->ignore($updateid),
            ],
        ];        

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error' , 'message' => $validator->errors()]);
        }

        $insert = Submenu::where('id' , $updateid)->update(['menu_id' => $menu_name , 'name' => $submenu_name,'slug' => $submenu_slug]);

        if ($insert) {
            return  response()->json(['status' => 'success']);
        }

    }

    public function delete_pages(Request $request){
        // dd($request->all());

        $delete = $request->id;
        $update = $request->update;

        if($delete){
            $insert = Page::where('id' , $delete)->delete();
        }

        if($update){
            $insert = Page::where('id' , $update)->first();
        }

        if ($insert) {
            return  response()->json(['status' => 'success' , 'data' => $insert]);
        }

    }

    public function update_page(Request $request){
        // dd($request->all());

        $updateid = $request->updateid;
        $menu_name = $request->menu_name;
        $submenu  = $request->submenu;
        $page_slug = $request->page_slug;

        $rules = [
            'page_slug' => [
                'required',
                Rule::unique('pages', 'slug')->ignore($updateid),
            ],
        ];        

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error' , 'message' => $validator->errors()]);
        }


        $insert = Page::where('id' , $updateid)->update(['slug' => $page_slug , 'submenu_id' => $submenu , 'menu_id' => $menu_name]);

        if ($insert) {
            return  response()->json(['status' => 'success']);
        }

    }

}
