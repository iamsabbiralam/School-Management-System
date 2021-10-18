<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Result;
use App\Models\StudentClass;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::with("classnames")->get();

        return view('student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['classes'] = StudentClass::pluck('name', 'id');

        return view('student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create([
            'class_id' => $request->get('class_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        if(empty($student)) {
            return redirect()->back()->withInput()->with("ERROR", __("Failed to filled form"));
        }
        return redirect()->route('students.index')->with("SUCCESS", __("Student data has been filled successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data['results'] = Result::where('student_id', $student->id)->get();
        $data['students'] = Student::where('id', $student->id)->first();

        return view('result.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function student() {

        $data['students'] = Student::with('classnames')->groupBy('class_id')->selectRaw('count(class_id) as total, class_id')->get();

        // dd($data);

        return view('student.total', $data);
    }

    public function total($id) {

        $data['students'] = Student::where('class_id', $id)->get();

        $data['classes'] = StudentClass::where('id', $id)->first();

        return view('student.classStudent', $data);
    }
}
