<?php

namespace App\Http\Controllers\VotingTable;

use App\VotingTable;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class VotingTableController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votingTables = VotingTable::all();

        return $this->showAll($votingTables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  VotingTable $votingTable
     * @return \Illuminate\Http\Response
     */
    public function show(VotingTable $votingTable)
    {
        return $this->showOne($votingTable);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  VotingTable $votingTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotingTable $votingTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  VotingTable $votingTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotingTable $votingTable)
    {
        $votingTable->delete();

        return $this->showOne($votingTable);
    }
}
