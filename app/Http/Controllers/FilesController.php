<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\File;
use Redirect;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function foni()
    {
        $fo = File::where('type','fo')
                    ->where('school_id', null)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $ni = File::where('type','ni')
                    ->where('school_id', null)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.foni')
                ->with('title', 'FO/NI')
                ->with('fo', $fo)
                ->with('ni', $ni);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFONI()
    {
        return view('admin.createFONI')
                ->with('title', 'Create FO/NI');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFONI(Request $request)
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
    public function deleteFONI($id)
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


    //Other Files

    public function otherFiles($type)
    {

        if($type == "si"){
            $tm = File::where('type','tm')
                    ->where('school_id', null)
                    ->orderBy('created_at', 'desc')
                    ->get();

            $do = File::where('type','do')
                    ->where('school_id', null)
                    ->orderBy('created_at', 'desc')
                    ->get(); 

            return view('admin.otherFiles')
                ->with('title', 'Special Instructions')
                ->with('var1', $tm)
                ->with('var2', $do)
                ->with('type', $type)
                ->with('title1', "TM")
                ->with('title2', "Daily Order");

        }elseif ($type == "cor") {
            $cor_in = File::where('type','cor_in')
                    ->where('school_id', null)
                    ->orderBy('created_at', 'desc')
                    ->get();

            $cor_out = File::where('type','cor_out')
                    ->where('school_id', null)
                    ->orderBy('created_at', 'desc')
                    ->get(); 

            return view('admin.otherFiles')
                ->with('title', 'Correspondences')
                ->with('var1', $cor_in)
                ->with('var2', $cor_out)
                ->with('type', $type)
                ->with('title1', "Incoming")
                ->with('title2', "Outgoing");        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOtherFiles($type)
    {

        if($type == "si"){
            
            $option = [null=>'Select','tm'=>'TM','do'=>'Daily Order'];
            
            return view('admin.createOtherFiles')
                    ->with('options', $option)
                    ->with('type', $type)
                    ->with('title', 'Add Special Instructions');

        }elseif ($type == "cor") {
            
            $option = [null=>'Select','cor_in'=>'Incoimg','cor_out'=>'Outgoing'];
            
            return view('admin.createOtherFiles')
                    ->with('options', $option)
                    ->with('type', $type)
                    ->with('title', 'Add Correspondences');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOtherFiles($type, Request $request)
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
    public function deleteOtherFiles($type, $id)
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
