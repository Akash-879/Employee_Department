<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class ReportController extends Controller
{
    public function secondHighestEarning()
    {
        $employee = Employee::orderBy('salary', 'desc')->skip(1)->take(1)->first();
        return view('reports.secondHighestEarning', compact('employee'));
    }

    public function fifthHighestEarning()
    {
        $employee = Employee::orderBy('salary', 'desc')->skip(4)->take(1)->first();
        return view('reports.fifthHighestEarning', compact('employee'));
    }

    public function avgSalaryByDepartment()
    {
        $avgSalaries = Employee::selectRaw('dept_id, AVG(salary) as avg_salary')
            ->groupBy('dept_id')
            ->get();

        return view('reports.avgSalaryByDepartment', compact('avgSalaries'));
    }
}

