<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\School;
use App\Classes;
use App\Course;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function classIndex($id)
    {
        $classes = Classes::where('school_id', $id)->get();
        return view('schools.classes.index')
                ->with('title', 'Classes')
                ->with('classes', $classes);
    }

    public function courseIndex($id)
    {
        $courses = Course::where('school_id', $id)->get();
        return view('schools.courses.index')
                ->with('title', 'Classes')
                ->with('classes', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::where('id',$id)
                        ->with('classes')
                        ->with('courses')
                        ->first();

        $class_number = $school->classes->count();
        $course_number = $school->courses->count();

        return view('schools.school')
                ->with('title', $school->name)
                ->with('school',$school)
                ->with('class_number',$class_number)
                ->with('course_number',$course_number);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
