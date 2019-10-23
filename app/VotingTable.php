<?php

namespace App;

use App\E14Card;
use App\Witness;
use App\VotingPlace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingTable extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
    	'number',
        'status',
    	'voting_place_id',
        'witness_id',
    ];

    public function votingPlace()	
    {
    	return $this->belongsTo(VotingPlace::class);
    }

    public function e14card()
    {
        return $this->hasOne(E14Card::class);
    }

    public function witness()
    {
        return $this->belonngsTo(Witness::class);
    }
}
