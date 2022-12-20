<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class SearchController extends Controller
{
    //
    public function search(Request $request, Review $review)
    {

         
           Review::all();


        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $reviews=$review->where('spot_name', 'LIKE', "%{$keyword}%")->get();
            return view('reviews/search')->with(['reviews' => $reviews]);
        }
        
        
        if(empty($keyword)) {
            return '入力されていません';
        }
    }
}