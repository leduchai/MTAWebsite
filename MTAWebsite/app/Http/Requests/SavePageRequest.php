<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SavePageRequest extends FormRequest
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
            'slug' => [
                'required', 
                Rule::unique("slugs")->ignore($this->get('id'), 'entity_id')->where(function ($query) {
                      $query->where('entity_type', ENTITY_TYPE_PAGE);
                })
            ]
        ];
    }
}
