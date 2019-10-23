<?php

namespace App\Http\Controllers\Election;

use App\Election;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ElectionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();

        return $this->showAll($elections);
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
            'scope' => 'requerid',
            'departament' => 'requerid',
            'municipality' => 'requerid',
        ];

        $this->validate($request, $rules);

        $election = Election::create($request->all());

        return $this->showOne($election);
    }

    /**
     * Display the specified resource.
     *
     * @param  Election $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        return $this->showOne($election);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Election $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        $election->delete();

        return $this->showOne($election);
    }
}
