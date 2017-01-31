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


    public function showSyllabus($school_id){
        
    }
    
    public function foni()
    {
        $fo = File::where('type','fo')
                    ->where('user_id', \Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $ni = File::where('type','ni')
                    ->where('user_id', \Auth::user()->id)
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
