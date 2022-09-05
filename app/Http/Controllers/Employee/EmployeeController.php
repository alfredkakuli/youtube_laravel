<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\PostEmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employees\EmployeeModel;

class EmployeeController extends Controller
{

    public $employeeInstance;

    public function   __construct(EmployeeModel $employeeInstance){

        $this->employeeInstance=$employeeInstance;

    }

    public function get_employee_list (Request $request){
        return view('admin.employee_list');
    }



    public function get_employees_ajax(Request $request ){
        if ($request->ajax()) {
            $employees=$this->employeeInstance->get_employees_ajax($request);
            return view('admin.employee_list_partials', compact('employees'))->render();
        }else{
            return view('admin.employee_list');
        }
    }


    public function post_employee(PostEmployeeRequest $request)
    {
        return $this->employeeInstance->post_employee($request);
    }






}
