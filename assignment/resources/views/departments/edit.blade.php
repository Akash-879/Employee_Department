@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Department - {{ $department->name }}</h1>

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Department</button>
        </form>
    </div>
@endsection
