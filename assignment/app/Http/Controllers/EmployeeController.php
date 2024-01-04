<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

use DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

      public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        $departments = Department::all();
        $hobbies = ['Reading', 'Cricket', 'Surfing', 'Swimming', 'Watching movies'];
        return view('employees.create', compact('departments', 'hobbies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'salary' => 'required|integer',
            'dept_id' => 'required',
            'hobbies' => 'required|array|min:1|max:3',
            'gender' => 'required|in:M,F',
        ]);

        Employee::create([
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'dept_id' => $request->input('dept_id'),
            'hobbies' => implode(',', $request->input('hobbies')),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $hobbies = ['Reading', 'Cricket', 'Surfing', 'Swimming', 'Watching movies'];
        return view('employees.edit', compact('employee', 'departments', 'hobbies'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'salary' => 'required|integer',
            'dept_id' => 'required',
            'hobbies' => 'required|array|min:1|max:3',
            'gender' => 'required|in:M,F',
        ]);

        $employee->update([
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'dept_id' => $request->input('dept_id'),
            'hobbies' => implode(',', $request->input('hobbies')),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

       public function report()
    {
        $secondHighest = Employee::orderBy('salary', 'desc')->skip(1)->take(1)->first();

        $fifthHighest = Employee::orderBy('salary', 'desc')->skip(4)->take(1)->first();

        $avgSalaryByDept = DB::table('employees')
            ->select('dept_id', DB::raw('AVG(salary) as avg_salary'))
            ->groupBy('dept_id')
            ->get();

        return view('employees.report', compact('secondHighest', 'fifthHighest', 'avgSalaryByDept'));
    }

}
