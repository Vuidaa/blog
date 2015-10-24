<?php

namespace Blog\Http\Requests;

use Blog\Http\Requests\Request;

class CategoryRequest extends Request
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

        switch ($this->method()) {
            case 'POST':
                return ['category' => 'required|min:2|unique:categories,category'];
                break;
            
            case 'PUT':
                return ['category' => 'required|min:2|unique:categories,category'];
                break;
        }
    }
}
