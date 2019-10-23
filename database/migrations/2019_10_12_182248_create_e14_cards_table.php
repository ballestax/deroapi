<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateE14CardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e14_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('blank_votes');
            $table->integer('null_votes');
            $table->integer('unmarks_votes');
            $table->integer('total_votes');
            $table->boolean('is_recount');
            $table->boolean('is_incineration');
            $table->bigInteger('voting_table_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voting_table_id')->references('id')->on('voting_tables');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e14_cards');
    }
}
