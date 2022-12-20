<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    
    public function index(User $user)
    {
        return view('reviews/user')->with(['own_reviews' => $user->getOwnPaginateByLimit()]);
    }
}