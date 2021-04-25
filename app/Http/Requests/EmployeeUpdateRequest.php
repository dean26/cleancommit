<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Elegant\Sanitizer\Laravel\SanitizesInput;

class EmployeeUpdateRequest extends FormRequest
{

    use SanitizesInput;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required|numeric',
            'phone' => 'nullable',
            'email' => 'nullable|email'
        ];
    }

    /**
     * filters
     *
     * @return void
     */
    public function filters()
    {
        return [
            'first_name' => 'trim|capitalize',
            'last_name' => 'trim|capitalize',
            'email' => 'trim',
            'phone' => 'trim'
        ];
    }
}
