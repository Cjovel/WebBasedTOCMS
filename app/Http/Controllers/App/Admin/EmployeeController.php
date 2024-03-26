<?php

namespace App\Http\Controllers\app\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('app.admin.employees.index', ['employees' =>  $employees]);
    }

    public function create()
    {
        return view('app.admin.employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'type' => 'required',
            'membershipdate' => 'required'
        ]);

        $newEmployee = Employee::create($data);

        return redirect(route('app.admin.employees.index'))->with('status', 'Employee has been succesfully added!');
    }

    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();

        return redirect(route('app.admin.employees.index'))->with('status', 'Employee has been succesfully deleted!');
    }

    public function modify(Employee $employee)
    {
        return view('app.admin.employees.modify', ['employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'type' => 'required',
            'membershipdate' => 'required'
        ]);

        $employee->update($data);

        return redirect(route('app.admin.employees.index'))->with('status', 'Employee has been succesfully updated!');
    }
}

