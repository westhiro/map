<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use App\Models\Review;

class TopPageController extends Controller
{
    //
    public function index(Prefecture $prefecture, Review $review)
    {
        return view('reviews/TopPage')->with(['review' => $review, 'prefectures' => $prefecture->get()]);
    }
}