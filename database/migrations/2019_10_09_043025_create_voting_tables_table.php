<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotingTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('status');
            $table->bigInteger('voting_place_id')->unsigned();
            $table->bigInteger('witness_id')->unsigned();            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voting_place_id')->references('id')->on('voting_places');
            $table->foreign('witness_id')->references('id')->on('witnesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voting_tables');
    }
}
