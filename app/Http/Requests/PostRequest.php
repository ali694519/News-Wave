<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        'title' => 'required|max:255',
        'content' => 'required',
        // 'category_id' => 'required',
        'Due_date' => 'required|date|after_or_equal:' . now()->format('Y-m-d'),
        // 'status' => 'required|in:publish,unpublish',
        'image' => 'nullable|image', // Adjust the validation rule based on your image requirements
        ];
    }
}
