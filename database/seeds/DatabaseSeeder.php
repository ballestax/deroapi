<?php

use App\User;
use App\E14Card;
use App\Witness;
use App\Election;
use App\Candidate;
use App\VotingPlace;
use App\VotingTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Election::truncate();
        Candidate::truncate();
        VotingPlace::truncate();
        VotingTable::truncate();
        E14Card::truncate();
        Witness::truncate();

        DB::table('candidate_voting_table')->truncate();
        DB::table('election_voting_place')->truncate();

        $userQuantity = 100;
        $electionQuantity = 2;
        $candidateQuantity = 6;
        $votingPlaceQuantity = 30;
        $votingTableQuantity = 600;
        $witnessQuantity = 100;

        factory(User::class, $userQuantity)->create();

        factory(Election::class, $electionQuantity)->create();
        factory(Candidate::class, $candidateQuantity)->create();
        factory(Witness::class, $witnessQuantity)->create();
        factory(VotingPlace::class, $votingPlaceQuantity)->create();
        factory(E14Card::class, $votingTableQuantity)->create();

        //factory(VotingTable::class, $votingTableQuantity)->create();
    }
}
