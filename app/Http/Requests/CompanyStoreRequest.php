<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Elegant\Sanitizer\Laravel\SanitizesInput;

class CompanyStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'image|max:1024|dimensions:min_width=100,min_height=100'
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
            'name' => 'trim|capitalize',
            'email' => 'trim',
            'website' => 'trim'
        ];
    }
}
