@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Employee Report</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">2nd Highest Earning Employee</h5>
                        @if($secondHighest)
                            <p><strong>Name:</strong> {{ $secondHighest->name }}</p>
                            <p><strong>Salary:</strong> {{ $secondHighest->salary }}</p>
                        @else
                            <p>No data available</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">5th Highest Earning Employee</h5>
                        @if($fifthHighest)
                            <p><strong>Name:</strong> {{ $fifthHighest->name }}</p>
                            <p><strong>Salary:</strong> {{ $fifthHighest->salary }}</p>
                        @else
                            <p>No data available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Average Salary by Department</h5>
                @if($avgSalaryByDept->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>Average Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avgSalaryByDept as $avgSalary)
                                <tr>
                                    <td>{{ $avgSalary->dept_id }}</td>
                                    <td>{{ $avgSalary->avg_salary }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No data available</p>
                @endif
            </div>
        </div>
    </div>
@endsection
