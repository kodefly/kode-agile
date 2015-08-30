<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectFormRequest extends Request
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
            'client_id'  => 'required',
            'name'       => 'required|min:3',
            'duration'   => 'required|integer',
            'start_date' => 'required|date',
        ];
    }
}
