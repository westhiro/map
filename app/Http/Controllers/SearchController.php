<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Review;
use App\Models\Prefecture;

class SearchController extends Controller
{
    //
    public function search(SearchRequest $request, Review $review, Prefecture $prefecture)
    {

         
           Review::all();
           
           
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $reviews = $review->where('spot_name', 'LIKE', "%{$keyword}%")->get();
            return view('reviews/search')->with(['reviews' => $reviews, 'prefecture' => $prefecture]);
        }
    }
    
     public function search_index(Request $request, Review $review, Prefecture $prefecture)
     {
         
          $keyword = $request->input('keyword');
          //dd($keyword);
          if(!empty($keyword)) {
              $prefecture_id = $request->input('prefecture_id');
              //dd($prefecture);
              $reviews=Review::where('prefecture_id', "{$prefecture_id}")->where('spot_name', 'LIKE', "%{$keyword}%")->get();
              //dd($reviews);
            }
          if(empty($keyword)) {
              $prefecture_id = $request->input('prefecture_id');
              $reviews=Review::where('prefecture_id', "{$prefecture_id}")->where('spot_name', 'LIKE', "%{$keyword}%")->get();
              return '入力されていません';
            }
          return view ('reviews/search')->with(['reviews' => $reviews, 'prefecture' => $prefecture]);
     }
}