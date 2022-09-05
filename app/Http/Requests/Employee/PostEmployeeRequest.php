<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class PostEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
           'email'=>'required|email|unique:employees,employee_email',
           'phone'=>'required:employees,employee_phone',
           'name'=>'required:employees,employee_name',
           'employee_photo'=>'image|mimes:jpeg,png,jpg|max:1024'
        ];
    }
}
