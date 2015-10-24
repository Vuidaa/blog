<?php

namespace Blog\Http\Requests;

use Blog\Http\Requests\Request;

use Auth;

class CommentRequest extends Request
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
                return ['name' => 'required|min:2|max:50|alpha_dash',
                        'email'=> 'required|email',
                        'comment'=>'required|min:2|max:50000',
                        'post_id'=> 'required|min:1|exists:posts,id'];
                break;
        }
    }
}
