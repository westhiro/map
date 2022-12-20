<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'prefecture_id',
    'date',
    'spot_name',
    'city_name',
    'body',
    'evaluation',
    'image_path',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function nices()
    {
        return $this->belongsToMany(User::class, 'user_reviews');
    }
    
    public function unnices()
    {
        return $this->belongsToMany(User::class, 'user_reviews');
    }
    
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('prefecture')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
