<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'review.spot_name' => 'required|string|max:100',
            'review.date' => 'required|string|max:100',
            'review.body' => 'required|string|max:4000',
            'review.city_name' => 'required|string|max:100',
            'review.evaluation' =>  'required|integer',
        ];
    }
}
