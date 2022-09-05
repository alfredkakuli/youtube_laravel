<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employee\EmployeeController;
Route::get('/',[EmployeeController::class, 'get_employee_list'])->name('get_employee_list');
Route::get('/get_employees_ajax',[EmployeeController::class, 'get_employees_ajax'])->name('get_employees_ajax');

Route::post('/post_employee',[EmployeeController::class, 'post_employee'])->name('post_employee');
