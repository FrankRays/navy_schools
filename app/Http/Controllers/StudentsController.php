<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\Student;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students = Student::all();
      return view('students.index')
              ->with('title', 'Student List')
              ->with('demoCounter', 1)
              ->with('demos', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create')
                ->with('title','Add Student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'email' =>  'required|email',
            'photo_url' =>  'required|image',
            'blood_group'   =>  'required',
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
            }else{

                return redirect()->back()
                ->withInput()
                ->with('error','photo upload failed!');
            }
            
            $student->name = $data['name'];
            $student->email = $data['email'];
            $student->blood_group = $data['blood_group'];
            $student->rank = $data['rank'];
            $student->mobile = $data['mobile'];
            $student->serial_number = $data['serial_number'];
            $student->po_number = $data['po_number'];
            $student->barrack_location = $data['barrack_location'];

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
    public function show($id)
    {
      $student = Student::findOrFail($id);
      return view('students.show')
            ->with('title', 'Student Details')
            ->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit')
            ->with('title', 'Edit Student Info')
            ->with('student', $student);   
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

        $student = Student::findOrFail($id);

        $rules =[
            'email' =>  'email',
            'photo_url' =>  'image'
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
    public function destroy($id)
    {
        try{
            $student = Student::findOrFail($id);
            $photo_url = $student->photo_url;
            if($student->delete()){
                unlink(public_path().$photo_url);
                return Redirect::route('student.index')->with('success', 'student deleted successfully');
            }else{
                return redirect()->route('student.index')
                            ->with('warning','student deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->route('student.index')
                            ->with('error','student deletion error');
        }
    }
}
