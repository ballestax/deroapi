<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\ApiController;
use App\Witness;
use Illuminate\Http\Request;

class WitnessVotingPlaceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Witness $witness)
    {
        $votingPlace = $witness->votingTables()->votingPlace()            
            ->get();

        return $this->showAll($votingPlace);
    }
}
