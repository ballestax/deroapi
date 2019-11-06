<?php

namespace App\Http\Controllers\Witness;

use App\E14Card;
use App\Candidate;
use App\VotingTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;

class WitnessRegisterVoteController extends ApiController
{
    	
	public function store(Request $request)
    {
    	$rules = [
            'candidate_id' => 'required',
            'voting_table_id' => 'required',
            'votes' => 'required',
            'blank_votes' => 'required',
            'null_votes' => 'required',
            'unmarks_votes' => 'required',
            'total_votes' => 'required',
            'is_recount' => 'required',
            'is_incineration' => 'required',
            'path' => 'image'
        ];

        

        $this->validate($request, $rules);


        $idCandidate = explode(",", $request->candidate_id);
        $idVotingTable = $request->voting_table_id;
        $votes = explode(",", $request->votes);

        $vTable = VotingTable::findOrFail($idVotingTable);

        if($vTable->status == 'ENVIADA'){
            return response()->json('Los datos de esta mesa ya se enviaron', 401);
        }

        $data = $request->all();




        $success = false;
		DB::beginTransaction();

        try {
            $i=0;
            foreach ($idCandidate as $id) {
                $candidate = Candidate::findOrFail($id);
                $candidate->votingTables()->attach($idVotingTable, ['votes' => $votes[$i]]);
                $i++;
            }        	


            $data['path'] = $request->path->store('');

            $e14card = E14Card::create($data);

            
            $vTable->status = 'ENVIADA';
            $vTable->save();

        	$success = true;
        } catch (Exception $e) {
        	
        }
        if ($success) {
            DB::commit();
            return response()->json('Datos guardados', 200);
        } else {
            DB::rollback();
            return response()->json('No se pudo guardar los datos', 401);
            
        }


        
    }

}
