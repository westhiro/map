<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;
use App\Models\Prefecture;


class My_pageController extends Controller
{
    //
    public function index(User $user, Review $review, Prefecture $prefecture)
    {
        $user_id = Auth::id();
        $own_reviews = $review->where("user_id", $user_id)->get();
        $nices =  Auth::user()->nices;
        $review_list = [];
        foreach($nices as $nice)
        {
            $review_list[] = $nice->id;
        }
        return view('reviews/my_page')->with(['my_user' => Auth::user(), 'own_reviews' => $own_reviews, 'nices' => $nices, 'prefecture' => $prefecture]);
    }
}