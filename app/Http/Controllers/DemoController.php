<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Demo;
use App\Http\Requests\DemoRequest;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demos = Demo::all();
        return view('demo.index')
                ->with('title', 'List of All demos')
                ->with('demoCounter', 1)
                ->with('demos', $demos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = $request->all();
        // $demo = new Demo();
        // $demo->name = $request->get('name');
        // $demo->email = $request->input('email');
        // $demo->reg = $request->input('reg');
        // $demo->address = $request->get('address');
        // $demo->sex = $request->get('sex');
        // try {
        //     $project->save();
        //     return redirect()->route('demo.index')->with('success', 'demo Added Successfuly.');
        // } catch(Exception $ex) {
        //     return redirect()->route('demo.index')->with('error', 'Something Went Wrong. Try Again');
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemoRequest $request)
    {
        $data = $request->all();
        $demo = new Demo();
        $demo->name = $request->get('name');
        $demo->email = $request->input('email');
        $demo->reg = $request->input('reg');
        $demo->address = $request->get('address');
        $demo->sex = $request->get('sex');
        if ($demo->save()){
            // return $this->responsed('Demo Created Successfully', 201);
            return response()->json([
                        'data' => $demo, // send newly created object
                        'message' => 'Demo Created Successfully',
                        'status_code' => 201
                        
                    ],201);
        } else {
            return $this->errorResponsed('Something went wrong. Please, try again.', 400);
        } 
        // return $this->errorResponsed('Something went wrong. Please, try again.', 400);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demo = Demo::findOrFail($id);
        return $demo;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demo = Demo::findOrFail($id);
        return $demo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DemoRequest $request, $id)
    {
        $data = $request->all();
        $demo = Demo::find($id);
        $demo->name = $request->get('name');
        $demo->email = $request->input('email');
        $demo->reg = $request->input('reg');
        $demo->address = $request->get('address');
        $demo->sex = $request->get('sex');
        try {
            $demo->save();
            return $this->responsed('Demo Updated Successfully', 201);
        } catch(Exception $ex) {
            return $this->errorResponsed('Something went wrong. Please, try again.', 400);
        } 
        return $this->errorResponsed('Something went wrong. Please, try again.', 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Demo::destroy($id);
            return $this->responsed('Demo Deleted Successfully.', 201);

        } catch(Exception $ex){
            // return $ex;
            return $this->errorResponsed('Something went wrong.Try Again.', 400);
        }
    }

    // code for json response to 
    private function responsed($message, $status = 200){
        return response()->json([
                        'data' => $message,
                        'status_code' => $status
                        
                    ],$status);
    }
    private function errorResponsed($message, $status = 400){
        return response()->json([
                        'error' => $message,
                        'status_code' => $status
                        
                    ], $status);
    }

}
