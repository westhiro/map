<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_review extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'review_id'
    ];
    
   public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function review() {
        return $this->belongsTo(Review::class);
    }
}