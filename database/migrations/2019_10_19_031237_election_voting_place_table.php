<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ElectionVotingPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_voting_place', function (Blueprint $table) {
            $table->bigInteger('election_id')->unsigned();
            $table->bigInteger('voting_place_id')->unsigned();
            
            $table->foreign('election_id')->references('id')->on('elections');
            $table->foreign('voting_place_id')->references('id')->on('voting_places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('election_voting_place');
    }
}
