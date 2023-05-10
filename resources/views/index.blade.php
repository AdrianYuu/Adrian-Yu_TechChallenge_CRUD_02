@extends('layouts.mainlayouts')

@section('title', 'Home')

@section('content')

@if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</td>
            <th class="text-center">Age</th>
            <th class="text-center">Gender</th>
            <th class="text-center">NIM</th>
            <th class="text-center">Major</th>
            <th class="text-center">Semester</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($studentList as $student)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $student->name }}</td>
                <td class="text-center">{{ $student->age }}</td>
                <td class="text-center">{{ $student->gender }}</td>
                <td class="text-center">{{ $student->nim }}</td>
                <td class="text-center">{{ $student->major }}</td>
                <td class="text-center">{{ $student->semester }}</td>
                <td class="text-center">
                    <a href="/update-student/{{ $student->id }}" class="btn btn-warning">Update</a>
                    <a href="/delete-student/{{ $student->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection