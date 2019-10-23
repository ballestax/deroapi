<?php

namespace App\Http\Controllers\Candidate;

use App\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CandidateController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return $this->showAll($candidates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name' => 'requerid',
            'lastname' => 'requerid',
            'number' => 'requerid',
            'political_party' => 'requerid',
        ];

        $this->validate($request, $rules);

        $candidate = Candidate::create($request->all());

        return $this->showOne($candidate);
    }

    /**
     * Display the specified resource.
     *
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return $this->showOne($candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $candidate->fill($request->only([
            'name',
            'lastname',
            'number',
            'image',
            'color',
            'political_party'
        ]));

        if($candidate->isClean()){
            return $this->errorResponse('You need specified any different value to update', 422);
        }

        $candidate->save();

        return $this->showOne($candidate);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return $this->showOne($candidate);
    }
}
