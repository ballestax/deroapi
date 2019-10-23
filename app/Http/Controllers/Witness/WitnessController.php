<?php

namespace App\Http\Controllers\Witness;

use App\Witness;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class WitnessController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $witnesses = Witness::all();

        return $this->showAll($witnesses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'identification' => 'required|unique:witnesses',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',            
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        if(!$request->has('status')){
            $data['status'] = Witness::INACTIVE_WITNESS;
        }

        $witness = Witness::create($data);

        return $this->showOne($witness, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Witness $witness)
    {
        return $this->showOne($witness);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Witness $witness)
    {
        $rules =[
            'identification' => 'unique:witnesses,identification,'.$witness->id,
            'password' => 'min:6|confirmed',
            'status' => 'in:'.Witness::ACTIVE_WITNESS.','.Witness::INACTIVE_WITNESS,
        ];

        if($request->has('firstname')){
            $witness->firstname = $request->firstname;
        }

        if($request->has('lastname')){
            $witness->lastname = $request->lastname;
        }

        if($request->has('password')){
            $witness->password = bcrypt($request->password);
        }

        if($request->has('status')){
            $witness->status = $request->status;
        }

        if(!$witness->isDirty()){
            return $this->errorResponse('You need specify a different value to update', 422);
        }

        $witness->save();

        return $this->showOne($witness);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Witness $witness)
    {        
        $witness->delete(); 

        return $this->showOne($witness);
    }
}
