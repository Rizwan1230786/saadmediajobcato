<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'last_date' => 'required',
            'description' => 'required',
            'news_paper' => 'nullable',
            'image' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'country_id.required' => 'Please select Country.',
            'state_id.required' => 'Please select State.',
            'city_id.required' => 'Please select City.',
            'last_date.required' => 'Last date to apply is required',
            'description.required' => 'Description is required'
        ];
    }
}
