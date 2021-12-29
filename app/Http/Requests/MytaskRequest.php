<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MytaskRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mytask.title' => 'max:50',
            'mytask.description' => 'max:250',
            'mytask.timer_count' => 'min:0',
        ];
    }
}
