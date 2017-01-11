<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
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
                ->with('school_id', $id)
                ->with('classes', $classes);
    }

    public function courseIndex($id)
    {
        $courses = Course::where('school_id', $id)->get();
        return view('schools.courses.index')
                ->with('title', 'Courses')
                ->with('school_id', $id)
                ->with('classes', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCourse($school_id)
    {
        $school = School::findOrFail($school_id);

        return view('schools.courses.create')
                ->with('title','Create Course')
                ->with('school', $school);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCourse( $school_id, Request $request)
    {
        $rules =[
            'name'          =>  'required',
            'code'          =>  'required',
            'officer'       =>  'required',
            'officer_mobile'=>  'required',
            'chief'         =>  'required',
            'chief_mobile'  =>  'required',
            'strength'      =>  'required',
            'duration'      =>  'required',
            'start_date'    =>  'required',
            'end_date'      =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            
            $school = School::findOrFail($school_id);
            
            $course = new Course();
            $course->school_id = $school_id;
            $course->name = $data['name'];
            $course->code = $data['code'];
            $course->officer = $data['officer'];
            $course->officer_mobile = $data['officer_mobile'];
            $course->chief = $data['chief'];
            $course->chief_mobile = $data['chief_mobile'];
            $course->strength = $data['strength'];
            $course->duration = $data['duration'];
            $course->start_date = $data['start_date'];
            $course->end_date = $data['end_date'];

            if($course->save()){
                return redirect()->back()
                ->with('success', 'course saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to create course!');
            }
        }
    }

    public function deleteCourse($school_id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        
        if($course->delete()){
                return redirect()->back()
                ->with('success', 'course deleted successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to delete course!');
            }
    }

    public function showCourse($school_id, $course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('schools.courses.show')
                ->with('title', $course->name.' '.$course->code)
                ->with('course', $course)
                ->with('school_id', $school_id);
    }

    public function editCourse($school_id, $course_id)
    {
        $course = Course::findOrFail($course_id);

        return view('schools.courses.edit')
                ->with('title', 'Edit Course')
                ->with('course', $course)
                ->with('school_id', $school_id);
    }

    public function updateCourse($school_id, $course_id, Request $request)
    {
        $rules =[
            'name'          =>  'required',
            'code'          =>  'required',
            'officer'       =>  'required',
            'officer_mobile'=>  'required',
            'chief'         =>  'required',
            'chief_mobile'  =>  'required',
            'strength'      =>  'required',
            'duration'      =>  'required',
            'start_date'    =>  'required',
            'end_date'      =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            
            $school = School::findOrFail($school_id);
            
            $course = Course::findOrFail($course_id);

            $course->school_id = $school_id;
            $course->name = $data['name'];
            $course->code = $data['code'];
            $course->officer = $data['officer'];
            $course->officer_mobile = $data['officer_mobile'];
            $course->chief = $data['chief'];
            $course->chief_mobile = $data['chief_mobile'];
            $course->strength = $data['strength'];
            $course->duration = $data['duration'];
            $course->start_date = $data['start_date'];
            $course->end_date = $data['end_date'];

            if($course->save()){
                return redirect()->back()
                ->with('success', 'course updated successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to update course!');
            }
        }
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
