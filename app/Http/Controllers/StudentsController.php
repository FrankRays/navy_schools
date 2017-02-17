<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\Student;
use App\Classes;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id, $class_id)
    {
      $classes = Classes::where('id',$class_id)->with('students')->get(); 

      return view('students.index')
              ->with('title', 'Student List')
              ->with('demoCounter', 1)
              ->with('demos', $students)
              ->with('school_id', $school_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school_id, $class_id)
    {
        return view('students.create')
                ->with('title','Add Student')
                ->with('school_id', $school_id)
                ->with('class_id', $class_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($school_id, $class_id, Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'email' =>  'required|email',
            'photo_url' =>  'image',
            //'blood_group'   =>  'required',
            'serial_number' =>  'required',
            'po_number' =>  'required',
            'rank'  =>  'required',
            'barrack_location'  =>  'required',
            'mobile'    =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $student = new Student();

            if($request->hasFile('photo_url')) {
                $file = \Input::file('photo_url');
                //getting timestamp
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $timestamp. '-' .$file->getClientOriginalName();

                
                $file->move(public_path().'/uploads/students', $name);

                $student->photo_url = '/uploads/students/'.$name;
            }

            $student->school_id = $school_id;
            $student->class_id = $class_id;
            $student->name = $data['name'];
            $student->email = $data['email'];
            $student->blood_group = isset($data['blood_group'])?$data['blood_group']:null;
            $student->rank = $data['rank'];
            $student->mobile = isset($data['mobile'])?$data['mobile']:null;
            $student->serial_number = $data['serial_number'];
            $student->po_number = $data['po_number'];
            $student->barrack_location = $data['barrack_location'];
            $student->permanent_address = isset($data['permanent_address'])?$data['permanent_address']:null;

            if($student->save()){
                return redirect()->back()
                ->with('success', 'Student saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save student!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($school_id, $class_id, $student_id)
    {
      $student = Student::findOrFail($student_id);
      return view('students.show')
            ->with('title', 'Student Details')
            ->with('student', $student)
            ->with('school_id', $school_id)
            ->with('class_id', $class_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, $class_id, $student_id)
    {
        $student = Student::findOrFail($student_id);
        return view('students.edit')
            ->with('title', 'Edit Student Info')
            ->with('student', $student)
            ->with('school_id', $school_id)
            ->with('class_id', $class_id);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, $class_id, $student_id, Request $request)
    {

        $student = Student::findOrFail($student_id);

        $rules =[
            'email' =>  'email'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            if($request->hasFile('photo_url')) {
                $file = \Input::file('photo_url');
                //getting timestamp
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $timestamp. '-' .$file->getClientOriginalName();

                
                $file->move(public_path().'/uploads/students', $name);

                unlink(public_path().$student->photo_url);

                $student->photo_url = '/uploads/students/'.$name;
            }
            
            $student->name = isset($data['name']) ? $data['name'] : $student->name;
            $student->email = isset($data['email']) ? $data['email'] : $student->email;
            $student->blood_group = isset($data['blood_group']) ? $data['blood_group'] : $student->blood_group;
            $student->rank = isset($data['rank']) ? $data['rank'] : $student->rank;
            $student->mobile =  isset($data['mobile']) ? $data['mobile'] : $student->mobile; 
            $student->serial_number = isset($data['serial_number']) ? $data['serial_number'] : $student->serial_number;
            $student->po_number = isset($data['po_number']) ? $data['po_number'] : $student->po_number;
            $student->barrack_location = isset($data['barrack_location']) ? $data['barrack_location'] : $student->barrack_location;
            $student->permanent_address = isset($data['permanent_address']) ? $data['permanent_address'] : $student->permanent_address;

            if($student->save()){
                return redirect()->back()
                ->with('success', 'Student info updated saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save student updates!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id, $class_id, $student_id)
    {
        try{
            $student = Student::findOrFail($student_id);
            $photo_url = $student->photo_url;
            if($student->delete()){
                unlink(public_path().$photo_url);
                return redirect::back()->with('success', 'student deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','student deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','student deletion error');
        }
    }
}
