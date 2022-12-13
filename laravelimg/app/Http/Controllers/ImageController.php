<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function store(Request $request){
        dd($request->all());
    $validator = Validator::make($request->all(),[
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
 
 
    if($validator->fails()){
        return response()->json([
            'status'=>422,
            'errors'=> $validator->messages()
        ]);
    }else{
        $imageobj = new Image();
        $imageName = time().'.'.$request->imageobj->extension();

        $request->image->move(public_path('image',$imageName));
        $imageobj->image = $imageName;
        $imageobj->save();
        return response()->json([
            'status'=>200,
            'message'=>'Image Added Successfully'
        ]);
        exit;
    }
   }


}