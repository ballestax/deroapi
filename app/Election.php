<?php

namespace App;

use App\Candidate;
use App\VotingPlace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Election extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $appends = ['candidates'];
    
    protected $fillable =[    	
    	'scope',
    	'departament',
    	'municipality'
    ];

    public function candidates()
    {
    	return $this->hasMany(Candidate::class);
    }

    public function votingPlaces()
    {
    	return $this->belongsToMany(VotingPlace::class, 'election_voting_place');
    }

    public function getCandidatesAttribute()
    {
        return $this->candidates()->get();
    }
}
