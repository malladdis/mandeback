<?php

namespace App\Http\Requests\API;

use App\Models\Outcome;
use InfyOm\Generator\Request\APIRequest;

class CreateOutcomeAPIRequest extends APIRequest
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
        return Outcome::$rules;
    }
}
