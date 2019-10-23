<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\ApiController;
use App\Witness;
use Illuminate\Http\Request;

class WitnessVotingTableController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Witness $witness)
    {
        $votingTables = $witness->votingTables;

        return $this->showAll($votingTables);
    }

   
}
