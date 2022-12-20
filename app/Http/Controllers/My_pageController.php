<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;
use App\Models\User_review;

class My_pageController extends Controller
{
    //
    public function index(Review $review, User $user)
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        $reviews = DB::table('reviews')->find($id);
        $nice = User_review::where('review_id', $review->id)->where('user_id', auth()->user()->id)->first();
        return view('reviews/my_page')->with(['my_user' => $user, 'my_review' => $reviews, 'reviews' => $review, 'nice' => $nice]);
    }
}