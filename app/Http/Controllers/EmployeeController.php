<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('home', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.index');
    }

    public function store(EmployeeRequest $request)
    {
        $emp = new Employee;

        $emp->firstname = $request->firstname;
        $emp->lastname = $request->lastname;
        $emp->company_id = $request->company;
        $emp->email = $request->email;
        $emp->phone = $request->phone;

        $emp->save();

        return redirect()
            ->back()
            ->with('success', 'added sccessfully');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee,$id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.edit',compact('employee'));
    }

    public function update(EmployeeRequest $request, Employee $employee, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->company_id = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->update();
        $employee->save();

        return redirect()
            ->back()
            ->with('success', 'update sccessfully');
    }

    public function destroy(Employee $employee, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()
            ->back()
            ->with('destroy', 'delete sccessfully');
    }
}
