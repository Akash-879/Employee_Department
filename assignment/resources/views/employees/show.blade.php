@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Employee Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $employee->id }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $employee->name }}</p>
                <p class="card-text"><strong>Salary:</strong> {{ $employee->salary }}</p>
                <p class="card-text"><strong>Department:</strong> {{ $employee->department->name }}</p>
                <p class="card-text"><strong>Hobbies:</strong> {{ $employee->hobbies }}</p>
                <p class="card-text"><strong>Gender:</strong> {{ $employee->gender }}</p>


                <a href="{{ route('employees.index') }}" class="btn btn-primary mt-3">Back to Employee List</a>
            </div>
        </div>
    </div>
@endsection
