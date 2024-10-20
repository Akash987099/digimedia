<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{

    public function FeedbackSave(Request $request){

        // dd($request->all());

        $data = [

            'name' => $request->name,
            'email' => $request->email,
            'star'  => $request->star,
            'description' => $request->description,

        ];

        if ($request->hasFile('image')) {
            $document = $request->file('image');
            $originalName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $document->getClientOriginalExtension();
            $uniqueName = $originalName . '_' . uniqid() . '.' . $extension;
            $documentPath = $document->move('feedback', $uniqueName , 'public');
            
            $data['image'] = $documentPath;
        }

        $admin = Feedback::create($data);

        if($admin){
            return response()->json(['status' => 'success']);
        }

    }

}
