<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\ResultRequest;
use Symfony\Component\Console\Input\Input;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $data['results'] = Result::groupBy('student_id')
        ->join('')
        ->selectRaw('sum(marks) as sum, student_id')
        ->orderByRaw('SUM(marks) DESC')
        ->get();

        // dd($data);

        return view('result.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Student::pluck('name', 'id');
        $data['results'] = Subject::pluck('subjects', 'id');

        return view('result.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\ResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    {
        // dd($request);
        $subject = Result::where('student_id', $request->student_id)
                    ->where('subject_id', $request->subject_id)
                    ->first();

        if($subject) {
            return redirect()->back()->withInput()->with("ERROR", __("Subject already exist"));
        }

        for ($i = 0; $i < count($request->all()); $i++) {
        $data = Result::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id[$i],
            'marks' => $request->marks[$i],
        ]);
    }
        if(empty($data)) {
            return redirect()->back()->withInput()->with("ERROR", __("Failed to Input"));
        }
        return redirect()->route('results.index')->with("SUCCESS", __("Form has been submitted successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(ResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}