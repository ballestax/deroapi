<?php

namespace App\Http\Controllers\Election;

use App\Election;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ElectionVotingPlaceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Election $election)
    {
        $votingPlaces = $election->votingPlaces;

        return $this->showAll($votingPlaces);
    }
    
}
