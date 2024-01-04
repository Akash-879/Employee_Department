@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Employee - {{ $employee->name }}</h1>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" required>
            </div>

            <div class="mb-3">
                <label for="dept_id" class="form-label">Department</label>
                <select class="form-select" id="dept_id" name="dept_id" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $employee->dept_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Hobbies</label>
                @foreach($hobbies as $hobby)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{ $hobby }}" name="hobbies[]" value="{{ $hobby }}" {{ in_array($hobby, explode(',', $employee->hobbies)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $hobby }}">{{ $hobby }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="M" {{ $employee->gender == 'M' ? 'checked' : '' }}>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="F" {{ $employee->gender == 'F' ? 'checked' : '' }}>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

