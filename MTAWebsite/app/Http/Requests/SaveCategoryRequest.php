<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Slug;
class SaveCategoryRequest extends FormRequest
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
            'title' => [
                'required',
                'min:3',
                Rule::unique('category')->ignore($this->get('id'))
            ], 
            'slug' => [
                'required', 
                Rule::unique("slugs")->ignore($this->get('id'), 'entity_id')->where(function ($query) {
                      $query->where('entity_type', ENTITY_TYPE_CATE_POSTS);
                })
            ]
        ];
    }
}
