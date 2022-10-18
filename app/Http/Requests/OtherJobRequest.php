<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherJobRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'company_name' => 'required',
            'url' => 'required',
            'job_type' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'posting_date' => 'required',
            'apply_before' => 'required',
            'image' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'company_name.required' => 'The Company name is required',
            'url.required' => 'Job URL is required',
            'country_id.required' => 'Please select Country.',
            'state_id.required' => 'Please select State.',
            'city_id.required' => 'Please select City.',
            'job_type.required' => 'The Job type is required',
            'posting_date.required' => 'Posting date is required',
            'description.required' => 'Description is required',
            'apply_before.required' => 'Apply before date is required',
        ];
    }
}
