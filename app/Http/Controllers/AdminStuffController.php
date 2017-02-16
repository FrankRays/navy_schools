<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\School;
use App\Staff;
use Redirect;

class AdminStuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        return view('admin.staffs.select')
            ->with('title', 'Admin');
    }

    public function index($type)
    {
        $staffs = Staff::where('school_id', null)
                        ->where('type', $type) 
                        ->get();

        return view('admin.staffs.index')
            ->with('title', 'Staffs - '.$type)
            ->with('type', $type)
            ->with('stuffs', $staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('admin.staffs.create')
                ->with('title', 'Add Stuff')
                ->with('type', $type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($type, Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'rank'  =>  'required',
            'po'    =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $stuff = new Staff();
            $stuff->rank = $data['rank'];
            $stuff->name = $data['name'];
            $stuff->user_id = \Auth::user()->id;
            $stuff->type = $type;
            $stuff->po = $data['po'];
            $stuff->contact = isset($data['contact'])?$data['contact']:null;
            $stuff->appointment = isset($data['appointment'])?$data['appointment']:null;

            if($stuff->save()){
                return redirect()->back()
                ->with('success', 'Staff saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save staff!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($stuff_id)
    {
        $staff = Staff::findOrFail($stuff_id);

        return view('admin.staffs.edit')
                ->with('title', 'Update Staff Info')
                ->with('staff', $staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($stuff_id, Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'rank'  =>  'required',
            'po'    =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $stuff = Staff::findOrFail($stuff_id);
            $stuff->rank = $data['rank'];
            $stuff->name = $data['name'];
            $stuff->po   = $data['po'];
            $stuff->contact = isset($data['contact'])?$data['contact']:null;
            $stuff->appointment = isset($data['appointment'])?$data['appointment']:null;

            if($stuff->save()){
                return redirect()->back()
                ->with('success', 'Staff saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save staff!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stuff_id)
    {
        try{
            $stuff = Staff::findOrFail($stuff_id);
            
            if($stuff->delete()){
                return redirect::back()->with('success', 'staff deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','staff deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','staff deletion error');
        }
    }
}
