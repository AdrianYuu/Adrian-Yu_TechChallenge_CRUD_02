@extends('layouts.mainlayouts')

@section('title', 'Home')

@section('content')

<h2>Are you sure want to delete this student?</h2>

<h6>Name : {{ $student->name }}</h6>
<h6>Age : {{ $student->age }}</h6>
<h6>Gender : {{ $student->gender }}</h6>
<h6>NIM : {{ $student->nim }}</h6>
<h6>Major : {{ $student->major }}</h6>
<h6>Semester : {{ $student->semester }}</h6>

<form action="/delete-student/{{ $student->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="/index" class="btn btn-success">Back</a>
</form>

@endsection