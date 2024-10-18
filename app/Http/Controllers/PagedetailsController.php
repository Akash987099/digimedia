<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagedetailsController extends Controller
{
    
    public function bannerSave(Request $request){

        // $request->validate([
        //     'title1.*' => 'required|string|max:255',
        //     'title2.*' => 'required|string|max:255',
        //     'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // dd($request->all());
        
    
        $titles = [];
        $images = [];
    
        $titles1 = [];
        $titles2 = [];
        $images = [];
        
        $title1 = $request->input('title1');
        $title2 = $request->input('title2');
        $imageFiles = $request->file('image');
        
        foreach ($title1 as $key => $title) {
            $titles1[] = $title; 
        
            if (isset($title2[$key])) {
                $titles2[] = $title2[$key];
            }
        
            if (isset($imageFiles[$key])) {
                $imageName = time() . '_' . $imageFiles[$key]->getClientOriginalName();
                $imageFiles[$key]->move(public_path('uploads'), $imageName);
                $images[] = $imageName; 
            } else {
                $images[] = null;  
            }
        }
        
        $data = [
            'banner_title' => json_encode($titles1),   
            'banner_subtitle' => json_encode($titles2),  
            'banner_image' => json_encode($images),    
        ];
        
        $page = Page::where('id' , $request->id)->update($data);
      
        if($page){
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);

    }

}
