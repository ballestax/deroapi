<?php

namespace App\Http\Controllers\VotingPlace;

use App\Http\Controllers\ApiController;
use App\VotingPlace;
use Illuminate\Http\Request;

class VotingPlaceVotingTableController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VotingPlace $votingPlace)
    {
        $votingTables = $votingPlace->votingTables;

        return $this->showAll($votingTables); 
    }

    
}
