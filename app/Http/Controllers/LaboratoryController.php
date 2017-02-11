<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Redirect;

use App\School, App\Laboratory, App\LabPhoto;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id)
    {
        $school = School::where('id',$school_id)->with('labs')->first();

        return view('schools.labs.index')
                ->with('title', 'Laboratories')
                ->with('school', $school);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school_id)
    {
        return view('schools.labs.create')
                ->with('title', 'Create Laboratory')
                ->with('school_id', $school_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($school_id, Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'oic' =>  'required',
            'oic_mobile' =>  'required',
            'lic'   =>  'required',
            'lic_mobile' =>  'required',
            'lab_facility' =>  'required',
            'equipment_list'  =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            $lab = new Laboratory();
            $lab->school_id = $school_id;
            $lab->name = $data['name'];
            $lab->oic = $data['oic'];
            $lab->oic_mobile = $data['oic_mobile'];
            $lab->lic = $data['lic'];
            $lab->lic_mobile = $data['lic_mobile'];
            $lab->lab_facility = $data['lab_facility'];
            $lab->equipment_list = $data['equipment_list'];


            if($lab->save()){
                return redirect()->back()
                ->with('success', 'Lab saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save Lab!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($school_id, $lab_id)
    {
        $lab = Laboratory::where('id',$lab_id)->with('photos')->first();

        return view('schools.labs.show')
                ->with('title', 'Lab Details')
                ->with('school_id', $school_id)
                ->with('lab', $lab);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, $lab_id)
    {
        $lab = Laboratory::findOrFail($lab_id);

        return view('schools.labs.edit')
                ->with('title', 'Update Lab Details')
                ->with('school_id', $school_id)
                ->with('lab', $lab);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, $lab_id, Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'oic' =>  'required',
            'oic_mobile' =>  'required',
            'lic'   =>  'required',
            'lic_mobile' =>  'required',
            'lab_facility' =>  'required',
            'equipment_list'  =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{
            $lab = Laboratory::findOrFail($lab_id);

            $lab->name = $data['name'];
            $lab->oic = $data['oic'];
            $lab->oic_mobile = $data['oic_mobile'];
            $lab->lic = $data['lic'];
            $lab->lic_mobile = $data['lic_mobile'];
            $lab->lab_facility = $data['lab_facility'];
            $lab->equipment_list = $data['equipment_list'];


            if($lab->save()){
                return redirect()->back()
                ->with('success', 'Lab saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save Lab!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id, $lab_id)
    {
        try{
            $lab = Laboratory::findOrFail($lab_id);
            $info = $lab;

            if($lab->delete()){
                //delete all files under the lab
                try{
                    foreach ($info->photos as $photo) {
                        unlink(public_path().$photo->file_path);
                    }
                }catch(\Exception $ex){
                    ;
                }

                return redirect::route('school.lab', $school_id)->with('success', 'lab deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','lab deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','lab deletion error');
        }
    }

    public function photos($school_id, $lab_id){

        $lab = Laboratory::where('id', $lab_id)->with('photos')->first();

        return view('schools.labs.photos')
                ->with('title','Manage Photos')
                ->with('lab', $lab)
                ->with('school_id', $school_id);
    }

    public function addPhoto($school_id, $lab_id, Request $request){
        $rules =[
            'file_path'  =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $thisfile = new LabPhoto();
            $thisfile->lab_id = $lab_id;
            $thisfile->description = isset($data['description']) ? $data['description'] : null;
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
                return redirect()->back()
                ->with('success', 'photo saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save photo!');
            }
        }
    }

    public function deletePhoto($school_id, $lab_id, $photo_id){

        $photo = LabPhoto::findOrFail($photo_id);

        $path = $photo->file_path;

        if($photo->delete()){
            unlink(public_path().$path);
            return redirect::back()->with('success', 'photo deleted successfully');
        }else{
            return redirect()->back()
                            ->with('warning','photo deletion error');
        }
    }
}
