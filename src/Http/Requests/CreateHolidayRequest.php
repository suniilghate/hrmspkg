<?php

namespace ITAIND\HRMSPKG\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ITAIND\HRMSPKG\Models\Holiday;

class CreateHolidayRequest extends FormRequest
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
        return Holiday::$rules;
    }
}
