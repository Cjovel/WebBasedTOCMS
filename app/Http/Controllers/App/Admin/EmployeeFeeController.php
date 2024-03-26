<?php

namespace App\Http\Controllers\app\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeFee;

class EmployeeFeeController extends Controller
{
    public function index()
    { 
        $employeefees = EmployeeFee::all();

        return view('app.admin.employeefees.index', ['employeefees' =>  $employeefees]);
    }
}
