<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\File;
use Redirect;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SchoolFilesController extends Controller
{
    public function foni($school_id)
    {
        $fo = File::where('type','fo')
                    ->where('school_id', $school_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $ni = File::where('type','ni')
                    ->where('school_id', $school_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('schools.foni.foni')
                ->with('title', 'FO/NI')
                ->with('school_id',$school_id)
                ->with('fo', $fo)
                ->with('ni', $ni);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFONI($school_id)
    {
        return view('schools.foni.createFONI')
                ->with('title', 'Create FO/NI')
                ->with('school_id', $school_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFONI($school_id, Request $request)
    {
        
        $rules =[
            'file_path' =>  'required',
            'type'      =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $thisfile = new File();

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
            
            $thisfile->user_id = \Auth::user()->id;
            $thisfile->school_id = $school_id;
            $thisfile->type = $data['type'];
            
            if($thisfile->save()){
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
    public function deleteFONI($school_id, $id)
    {
        try{
            $file = File::findOrFail($id);
            $file_path = $file->file_path;
            if($file->delete()){
                if($file_path != '/uploads/files/test.pdf'){
                    unlink(public_path().$file_path);    
                }
                return Redirect::back()->with('success', 'file deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','file deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','file deletion error');
        }
    }


    //TM functions

    public function tm($school_id)
    {
        $tm = File::where('type','tm')
                    ->where('school_id', $school_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $do = File::where('type','do')
                    ->where('school_id', $school_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('schools.tm.tm')
                ->with('title', 'TMs')
                ->with('school_id',$school_id)
                ->with('tm', $tm)
                ->with('do', $do);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTM($school_id)
    {
        return view('schools.tm.createTM')
                ->with('title', 'Add Special Instructions')
                ->with('school_id', $school_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTM($school_id, Request $request)
    {
        
        $rules =[
            'file_path' =>  'required',
            'type'      =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $thisfile = new File();

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
            
            $thisfile->user_id = \Auth::user()->id;
            $thisfile->school_id = $school_id;
            $thisfile->type = $data['type'];
            
            if($thisfile->save()){
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
    public function deleteTM($school_id, $id)
    {
        try{
            $file = File::findOrFail($id);
            $file_path = $file->file_path;
            if($file->delete()){
                if($file_path != '/uploads/files/test.pdf'){
                    unlink(public_path().$file_path);    
                }
                return Redirect::back()->with('success', 'file deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','file deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','file deletion error');
        }
    }

    //Correspondences functions
    public function cor($school_id)
    {
        $cor_in = File::where('type','cor_in')
                    ->where('school_id', $school_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $cor_out = File::where('type','cor_out')
                    ->where('school_id', $school_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('schools.cor.cor')
                ->with('title', 'Correspondences')
                ->with('school_id',$school_id)
                ->with('cor_in', $cor_in)
                ->with('cor_out', $cor_out);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCOR($school_id)
    {
        return view('schools.cor.createCOR')
                ->with('title', 'Add Correspondences')
                ->with('school_id', $school_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCOR($school_id, Request $request)
    {
        
        $rules =[
            'file_path' =>  'required',
            'type'      =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $thisfile = new File();

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
            
            $thisfile->user_id = \Auth::user()->id;
            $thisfile->school_id = $school_id;
            $thisfile->type = $data['type'];
            
            if($thisfile->save()){
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
    public function deleteCOR($school_id, $id)
    {
        try{
            $file = File::findOrFail($id);
            $file_path = $file->file_path;
            if($file->delete()){
                if($file_path != '/uploads/files/test.pdf'){
                    unlink(public_path().$file_path);    
                }
                return Redirect::back()->with('success', 'file deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','file deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','file deletion error');
        }
    }
    
    
}
