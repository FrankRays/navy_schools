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

class ClassesController extends Controller
{
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
        $class = Classes::where('id',$class_id)->with('students')->first();
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
