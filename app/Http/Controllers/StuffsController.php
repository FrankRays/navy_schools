<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\School;
use App\Stuff;
use Redirect;

class StuffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($school_id)
    {
        $school = School::where('id', $school_id)
                        ->with('stuffs') 
                        ->first();

        return view('schools.stuffs.index')
            ->with('title', 'Admin of School')
            ->with('school', $school);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school_id)
    {
        $types = [
            null        =>  'Select a category',
            'officer'   =>  'Officer',
            'sailor'    =>  'Sailor',
            'civil'     =>  'Civil'
        ];
        return view('schools.stuffs.create')
                ->with('title', 'Add Stuff')
                ->with('types', $types)
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
            'rank'  =>  'required',
            'po'    =>  'required',
            'type'  =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $stuff = new Stuff();
            $stuff->rank = $data['rank'];
            $stuff->name = $data['name'];
            $stuff->school_id = $school_id;
            $stuff->user_id = \Auth::user()->id;
            $stuff->type = $data['type'];
            $stuff->po = $data['po'];

            if($stuff->save()){
                return redirect()->back()
                ->with('success', 'Stuff saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save stuff!');
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
    public function edit($school_id, $stuff_id)
    {
        $stuff = Stuff::findOrFail($stuff_id);

        $types = [
            null        =>  'Select a category',
            'officer'   =>  'Officer',
            'sailor'    =>  'Sailor',
            'civil'     =>  'Civil'
        ];
        return view('schools.stuffs.edit')
                ->with('title', 'Update Stuff Info')
                ->with('types', $types)
                ->with('stuff', $stuff)
                ->with('school_id', $school_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, $stuff_id, Request $request)
    {
        $rules =[
            'name'  =>  'required',
            'rank'  =>  'required',
            'po'    =>  'required',
            'type'  =>  'required'
        ];

        $data = $request->all();

        $validation = Validator::make($data,$rules);

        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            $stuff = Stuff::findOrFail($stuff_id);
            $stuff->rank = $data['rank'];
            $stuff->name = $data['name'];
            $stuff->type = $data['type'];
            $stuff->po   = $data['po'];

            if($stuff->save()){
                return redirect()->back()
                ->with('success', 'Stuff saved successfully');
            }else{
                return redirect()->back()
                ->withInput()
                ->with('error','failed to save stuff!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id, $stuff_id)
    {
        try{
            $stuff = Stuff::findOrFail($stuff_id);
            
            if($stuff->delete()){
                return redirect::back()->with('success', 'stuff deleted successfully');
            }else{
                return redirect()->back()
                            ->with('warning','stuff deletion error');
            }
        }catch(\Exception $ex){
            return redirect()->back()
                            ->with('error','stuff deletion error');
        }
    }
}
