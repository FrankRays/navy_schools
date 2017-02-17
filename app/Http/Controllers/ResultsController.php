<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\Classes;
use App\Result;
use App\Student;
use App\Mark;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id, $class_id)
    {
        $class = Classes::where('id', $class_id)->with('results')->first();
        return view('schools.classes.results.index')
                ->with('title', $class->name.' '.$class->code)
                ->with('class', $class)
                ->with('school_id', $school_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school_id, $class_id)
    {
        $class = Classes::findOrFail($class_id);

        return view('schools.classes.results.create')
                ->with('title', $class->name.' '.$class->code)
                ->with('class', $class)
                ->with('school_id', $school_id);
    }

    public function store($school_id, $class_id, Request $request){
        $rules =[
            'subject'       =>  'required',
            'full_marks'    =>  'required'  
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            $result = new Result();
            $result->class_id = $class_id;
            $result->subject = $data['subject'];
            $result->full_marks = $data['full_marks'];

            if($result->save()){
                return redirect()->back()
                ->with('success', 'result saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save result!');
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function file($school_id, $class_id, $result_id, Request $request)
    {
        $rules =[
            'file_path' =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $thisfile = Result::findOrFail($result_id);

            $oldFile = $thisfile->file_path;
            
            if($request->hasFile('file_path')) {
                $file = \Input::file('file_path');
                //getting timestamp
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $timestamp. '-' .$file->getClientOriginalName();

                
                $file->move(public_path().'/uploads/files', $name);

                $thisfile->file_path = '/uploads/files/'.$name;
            }else{

                return redirect()->back()
                ->withInput()
                ->with('error','file upload failed!');
            }

            if($thisfile->save()){
                if($oldFile){
                    unlink(public_path().$oldFile);
                }
                return redirect()->back()
                ->with('success', 'file saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save file!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($school_id, $class_id, $result_id)
    {
        $class = Classes::where('id', $class_id)
                        ->with('students')
                        ->first();
        $result = Result::findOrFail($result_id);

        foreach ($class->students as $student) {
            $student->marks = Mark::where('result_id', $result_id)
                                    ->where('student_id', $student->id)
                                    ->pluck('marks_obtained'); 
        }

        return view('schools.classes.results.marksheet')
                ->with('title',$class->name.' '.$class->code)
                ->with('school_id', $school_id)
                ->with('result', $result)
                ->with('class', $class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, $class_id, $result_id)
    {
        $result = Result::findOrFail($result_id);

        return view('schools.classes.results.edit')
                ->with('title', 'Edit Result')
                ->with('class_id', $class_id)
                ->with('school_id', $school_id)
                ->with('result', $result);
    }

    public function upgrade($school_id, $class_id, $result_id, Request $request){
        $rules =[
            'subject'       =>  'required',
            'full_marks'    =>  'required'  
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            $result = Result::findOrFail($result_id);
            $result->subject = $data['subject'];
            $result->full_marks = $data['full_marks'];

            if($result->save()){
                return redirect()->back()
                ->with('success', 'result saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save result!');
            }
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, $class_id, $result_id, $student_id, Request $request)
    {
        $rules =[
            'marks'   =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            //return $school_id.' '.$class_id.' '.$result_id.' '.$student_id;
            $mark = Mark::where('result_id', $result_id)
                        ->where('student_id', $student_id)
                        ->first();
            if($mark){
                $mark->marks_obtained = $data['marks'];
            }else{
                $mark = new Mark();
                $mark->marks_obtained = $data['marks'];
                $mark->result_id = $result_id;
                $mark->student_id = $student_id;
            }

            if($mark->save()){
                return redirect()->back()
                ->with('success', 'mark saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save marks!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id, $class_id, $result_id)
    {
        $result = Result::findOrFail($result_id);
        $file = $result->file_path;
        
        if($result->delete()){
            try{
                unlink(public_path().$file);
            }catch(\Exception $ex){
                ;
            }
                return redirect()->route('school.class.result', $school_id, $class_id)
                ->with('success', 'result deleted successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to delete results!');
            }
    }

    public function approve($school_id, $class_id, $result_id){
        
        $result = Result::findOrFail($result_id);
        
        $result->verification = true;

        if($result->save()){
            return redirect()->back()
                ->with('success', 'result verified successfully');
        }else{
            return redirect()->back()
                ->withInput()
                ->with('error','failed to verify result!');
            }
    }

    public function finalResult($school_id, $class_id){
        
        $class = Classes::where('id', $class_id)->with('students')->with('results')->first();

        $results = $class->results;
        $students = $class->students;

        $rows = [];
        $data = [];

        $marksheet = [];
        $percentage = [];

        foreach ($results as $key => $result) {
            $marksheet[] = [
                            'id'      => $result->id,
                            'subject' => $result->subject,
                            'full_marks' => $result->full_marks
                        ];

        }

        foreach ($marksheet as $indx=>$result) {
            foreach ($students as $in=>$student) {
                $mark = Mark::where('result_id', $result['id'])
                            ->where('student_id', $student->id)
                            ->first();
                $data[$indx][$in] = $mark->marks_obtained;
                $percentage[$indx][$in] = ($mark->marks_obtained/$result['full_marks'])*100;
            }
            $rows[] = $result['subject'];
        }
        $totals = [];
        $percentList = [];
        foreach ($students as $indx => $student) {
            $total = 0;
            $percent = 0;
            for ($i=0; $i < count($data) ; $i++) { 
                 $total += $data[$i][$indx];
                 $percent += $percentage[$i][$indx];
            }
            $totals[] = $total;
            $percentList[] = $percent/count($percentage);
        }

        return view('schools.classes.results.final')
                ->with('title', "Final Result Sheet")
                ->with('school_id', $school_id)
                ->with('class_id', $class_id)
                ->with('students', $students)
                ->with('rows', $rows)
                ->with('data', $data)
                ->with('totals', $totals)
                ->with('percentage', $percentList);

    }
}
