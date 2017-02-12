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
use Redirect;

class ClassesController extends Controller
{

    public function checkClass(){
        $now = Carbon::now();
        $courses = Course::where('start_date','<=', $now)
                        ->where('end_date','>=', $now)
                        ->with('classes')
                        ->get();
        $result = [];
        foreach ($courses as $indx => $course) {
            if($course->classes == null){
                $result[] = $course;
            }
        }
        // result - consists of all courses that needs a class to be generated
        foreach ($result as $key => $course) {
            $class = new Classes();
            $class->school_id = $course->school_id;
            $class->course_id = $course->id;
            $class->name = $course->name;
            $class->code = $course->code;
            $class->officer = $course->officer;
            $class->officer_mobile = $course->officer_mobile;
            $class->chief = $course->chief;
            $class->chief_mobile = $course->chief_mobile;
            $class->strength = $course->strength;
            $class->duration = $course->duration;
            $class->start_date = $course->start_date;
            $class->end_date = $course->end_date;

            if($class->save()){
                ;
            }else{
                return 'error';
            }
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $classes = Classes::where('school_id', $id)->get();
        return view('schools.classes.index')
                ->with('title', 'Classes')
                ->with('school_id', $id)
                ->with('today', Carbon::now())
                ->with('classes', $classes);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school_id)
    {
        $school = School::findOrFail($school_id);

        return view('schools.classes.create')
                ->with('title','Create Class')
                ->with('school', $school);
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
    public function show($school_id, $class_id)
    {
        $class = Classes::where('id',$class_id)
                        //->with('files')
                        ->with('students')
                        ->first();
        return view('schools.classes.show')
                ->with('title', $class->name.' '.$class->code)
                ->with('class', $class)
                ->with('school_id', $school_id);
    }

    public function students($school_id, $class_id)
    {
        $class = Classes::where('id',$class_id)->with('students')->first();
        return view('schools.classes.students')
                ->with('title', $class->name.' '.$class->code)
                ->with('class', $class)
                ->with('school_id', $school_id);
    }

    public function result($school_id, $class_id)
    {
        $class = Classes::where('id',$class_id)->with('students')->first();
        return view('schools.classes.result')
                ->with('title', $class->name.' '.$class->code)
                ->with('class', $class)
                ->with('school_id', $school_id);
    }

    public function approve($school_id, $class_id){
        
        $class = Classes::findOrFail($class_id);
        
        $class->approval = true;

        if($class->save()){
                return redirect()->back()
                ->with('success', 'class apporved successfully');
            }else{
                return redirect()->back()
                ->with('error','class approval failed!');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, $class_id)
    {
        $class = Classes::findOrFail($class_id);

        return view('schools.classes.edit')
                ->with('title', 'Update Class')
                ->with('class', $class)
                ->with('school_id', $school_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, $class_id, Request $request)
    {
        $rules =[
            'name'          =>  'required',
            'code'          =>  'required',
            // 'officer'       =>  'required',
            // 'officer_mobile'=>  'required',
            // 'chief'         =>  'required',
            // 'chief_mobile'  =>  'required',
            // 'strength'      =>  'required',
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
                        
            $class = Classes::findOrFail($class_id);

            $class->name = $data['name'];
            $class->code = $data['code'];
            $class->officer = isset($data['officer']) ? $data['officer'] : null;
            $class->officer_mobile = isset($data['officer_mobile']) ? $data['officer_mobile'] : null;
            $class->chief = isset($data['chief']) ? $data['chief'] : null;
            $class->chief_mobile = isset($data['chief_mobile']) ? $data['chief_mobile'] : null;
            $class->instructor = isset($data['instructor']) ? $data['instructor'] : null;
            $class->instructor_mobile = isset($data['instructor_mobile']) ? $data['instructor_mobile'] : null;
            $class->strength = isset($data['strength']) ? $data['strength'] : null;
            $class->duration = $data['duration'];
            $class->start_date = $data['start_date'];
            $class->end_date = $data['end_date'];

            if($class->save()){
                return redirect()->back()
                ->with('success', 'class updated successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to update class!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id, $class_id)
    {
        $class = Classes::findOrFail($class_id);
        
        if($class->delete()){
                return redirect()->route('school.class.index',$school_id)
                ->with('success', 'class deleted successfully');
            }else{
                return redirect()->route('school.class.index',$school_id)
                ->withInput()
                ->with('error','failed to delete class!');
            }
    }
}
