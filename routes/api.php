<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('candidates', 'Candidate\CandidateController', ['except' => ['create', 'edit']]);

/*
*	Elections
*/
Route::resource('elections', 'Election\ElectionController', ['except' => ['create', 'edit']]);
Route::resource('elections.candidates', 'Election\ElectionCandidateController', ['only' => ['index']]);
Route::resource('elections.voting_places', 'Election\ElectionVotingPlaceController', ['only' => ['index']]);

/*
*	Voting places
*/
Route::resource('voting_places', 'VotingPlace\VotingPlaceController', ['except' => ['create', 'edit']]);
Route::resource('voting_places.voting_tables', 'VotingPlace\VotingPlaceVotingTableController', ['only' => ['index']]);
Route::resource('voting_places.witnesses', 'VotingPlace\VotingPlaceWitnessController', ['only' => ['index']]);


/*
*	Voting tables
*/
Route::resource('voting_tables', 'VotingTable\VotingTableController', ['except' => ['create', 'edit']]);
Route::resource('voting_tables.voting_places', 'VotingTable\VotingTableVotingPlaceController', ['only' => ['index']]);

/*
*	Witness
*/
Route::resource('witnesses', 'Witness\WitnessController', ['except' => ['create', 'edit']]);
Route::resource('witnesses.voting_places', 'Witness\WitnessVotingPlaceController', ['only' => ['index']]);
Route::resource('witnesses.voting_tables', 'Witness\WitnessVotingTableController', ['only' => ['index']]);
