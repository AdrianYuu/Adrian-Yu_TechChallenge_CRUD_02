<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $studentList = Student::all();
        return view('index', ['studentList' => $studentList]);
    }

    public function create()
    {
        return view('add-student');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:50',
            'age' => 'required|min:1|integer',
            'gender' => 'required',
            'nim' => 'required|unique:students|integer',
            'major' => 'required|min:5|max:50|',
            'semester' => 'required|min:1',
        ]);

        $student = Student::create($request->all());

        if($student){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully add new student!');
        }

        return redirect('index');
    }

    public function edit ($id)
    {
        $student = Student::findOrFail($id);
        return view('update-student', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:5|max:50',
            'age' => 'required|min:1|integer',
            'gender' => 'required',
            'nim' => 'required|integer',
            'major' => 'required|min:5|max:50',
            'semester' => 'required|min:1|integer',
        ]);

        $updated = $student->update($request->all());

        if($updated){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully updated student!');
        }

        return redirect('index');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('delete-student', ['student' => $student]);
    }

    public function destroy($id)
    {
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();

        if($deletedStudent){
            Session::flash('status', 'success');
            Session::flash('message', 'Successfully delete student!');
        }

        return redirect('index');
    }
}
