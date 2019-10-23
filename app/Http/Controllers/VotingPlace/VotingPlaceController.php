<?php

namespace App\Http\Controllers\VotingPlace;

use App\VotingPlace;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class VotingPlaceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votingPlaces = VotingPlace::all();

        return $this->showAll($votingPlaces);
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
            'name' => 'required',
            'code' => 'required|unique:voting_places',
            'departament' => 'required',
            'municipality' => 'required',
            'zone' => 'required',
            'potencial' => 'required',            
        ];

        $this->validate($request, $rules);

        $newVotingPlace = VotingPlace::create($request->all());

        return $this->showOne($newVotingPlace, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VotingPlace $votingPlace)
    {        
        return $this->showOne($votingPlace);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotingPlace $votingPlace)
    {
        $votingPlace->fill($request->only([
            'name',
            'code',
            'departament',
            'municipality',
            'zone',
            'potencial'
        ]));

        if($votingPlace->isClean()){
            return $this->errorResponse('You need specified any different value to update', 422);
        }

        $votingPlace->save();

        return $this->showOne($votingPlace);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotingPlace $votingPlace)
    {
        $votingPlace->delete();

        return $this->showOne($votingPlace);
    }
}
