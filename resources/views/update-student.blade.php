@extends('layouts.mainlayouts')

@section('title', 'Home')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/update-student/{{ $student->id }}" method="POST" class="col-8 m-auto">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="Name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}">
    </div>

    <div class="mb-3">
        <label for="age">Age</label>
        <input type="text" class="form-control" name="age" id="age" value="{{ $student->age }}">
    </div>

    <div class="mb-3">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value="{{ $student->gender }}">{{ $student->gender }}</option>
            @if($student->gender == "Male")
                <option value="Female">Female</option>
            @else
                <option value="Male">Male</option>
            @endif
        </select>
    </div>

    <div class="mb-3">
        <label for="nim">NIM</label>
        <input type="text" class="form-control" name="nim" id="nim" value="{{ $student->nim }}">
    </div>

    <div class="mb-3">
        <label for="major">Major</label>
        <input type="text" class="form-control" name="major" id="major" value="{{ $student->major }}">
    </div>

    <div class="mb-3">
        <label for="semester">Semester</label>
        <input type="text" class="form-control" name="semester" id="semester" value="{{ $student->semester }}">
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>


@endsection