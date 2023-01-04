<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\Prefecture;
use App\Models\User_review;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class ReviewController extends Controller
{
    //
    public function index(Review $review, Prefecture $prefecture)
    {
        $reviews_prefecture = Review::where("prefecture_id", "{$prefecture->id}")->orderBy('created_at','desc')->paginate(5);
        
        //dd($prefecture->id);
        return view('reviews/index')->with(['reviews' => $reviews_prefecture, 'prefecture' => $prefecture]);
    }
    
    public function show(Prefecture $prefecture, Review $review)
    {
        //dd($prefecture->loadAvg('reviews as avg', 'evaluation'));
        //dd($review->nices()->count());
         $nice = User_review::where('review_id', $review->id)->where('user_id', auth()->user()->id)->first();
         return view('reviews/show')->with(['review' => $review, 'prefecture' => $prefecture, 'nice' => $nice]);
    }
    
    public function create(Prefecture $prefecture)
    {
         //dd($prefecture->get());
         return view('reviews/create')->with(['prefectures' => $prefecture->get()]);
    }
    
    public function store(Review $review, ReviewRequest $request, Prefecture $prefecture)
    {
        $review->evaluation=$review->where('prefecture_id', $prefecture->id)->avg('evaluation');
        $review -> user_id = \Auth::id(); 
        
        $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        
        $input = $request['review'];
        $input += ['image_path' => $image_path];
        $review->fill($input)->save();
        return redirect('/');
    }
    
    public function edit(Prefecture $prefecture, Review $review)
    {
        return view('reviews/edit')->with(['review' => $review, 'prefecture' => $prefecture]);
    }
    
    public function update(Request $request, Review $review)
    {
        $review -> user_id = \Auth::id(); 
        $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //dd($request->file('image'));
        $input_review = $request['review'];
        $input_review += ['image_path' => $image_path];
        $review->fill($input_review)->save();
        return redirect('/my_page');
    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/my_page');
    }
    
    public function deleteimage(Review $review)
    {
        $review['image_path'] = null;
        $review->save();
        return redirect('/my_page');
    }
    
    public function nice(Review $review, Request $request){
        $user=Auth::user();
        $user->nices()->attach($review->id);
        return back();
    }
    
    public function unnice(Review $review, Request $request){
        $user=Auth::user();
        $user->unnices()->detach($review->id);
        return back();
    }
}
