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
        //$prefecture_average = Review::select('prefecture_id')
         //->selectRaw('AVG(evaluation) as evaluate')
         //->groupBy('prefecture_id')
         //->orderBy('evaluate')->having('evaluate', '>=', 3.5)
         //->with('prefecture')
         //->get();
         
         //$spot_average=Review::select('spot_name')
         //->selectRaw('AVG(evaluation) as evaluate')
         //->groupBy('spot_name')
         //->orderBy('evaluate')->having('evaluate', '>=', 3.5)
         //->get();
         //dd($spot_average);
         //dd($prefecture_average);
        return view('reviews/TopPage')->with(['review' => $review, 'prefectures' => $prefecture->get(), 'prefecture_averages' => $prefecture_average, 'spot_averages' => $spot_average]);
    }
}