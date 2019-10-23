<?php

namespace App\Http\Controllers\VotingPlace;

use App\Http\Controllers\ApiController;
use App\VotingPlace;
use Illuminate\Http\Request;

class VotingPlaceWitnessController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VotingPlace $votingPlace)
    {
        $witnesses = $votingPlace->votingTables()
            ->with('witness')
            ->get()
            ->pluck('witness')
            ->value();

        dd($witnesses);
            //->whith('witnesses')
            //->get();

        return $this->showAll($witnesses);
    }

   
}
