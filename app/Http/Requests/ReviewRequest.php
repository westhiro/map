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
    
    public function messages()
    {
        return [
            'review.spot_name' => '観光名所名が入力されていません',
            'review.date' => '日付が入力されていません',
            'review.body' => '内容が入力されていません',
            'review.city_name' => '都市名が入力されていません',
            'review.evaluation' => '評価が入力されていません',
        ];
    }
}
