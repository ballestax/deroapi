<?php

namespace App\Http\Controllers\VotingTable;

use App\Http\Controllers\ApiController;
use App\VotingTable;
use Illuminate\Http\Request;

class VotingTableVotingPlaceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VotingTable $votingTable)
    {
        $votingPlace = $votingTable->votingPlace;

        return $this->showOne($votingPlace);
    }

    
}
