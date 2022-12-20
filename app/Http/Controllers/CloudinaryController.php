<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;


class CloudinaryController extends Controller
{
        public function cloudinary()
        {
            return view('reviews/create'); 
        }
       
        public function cloudinary_store(Request $request)
        {

            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            dd($image_urll); 
        }
}
