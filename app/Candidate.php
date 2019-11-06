<?php

namespace App;

use App\VotingTable;
use App\PoliticalParty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
    	'name',
    	'lastname',
        'number',
    	'image',
    	'color',
    	'political_party',
        'election_id'
    ];

    public function setNameAttribute($name)
    {
      $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute($name)
    {
      return ucwords($name);
    }

    public function setLastnameAttribute($lastname)
    {
        $this->attributes['lastname'] = strtolower($lastname);
    }

    public function getLastnameAttribute($lastname)
    {
        return ucwords($lastname);
    }

    public function election()
    {
    	return $this->belongsTo(Election::class);
    }

    public function votingTables()
    {
        return $this->belongsToMany(VotingTable::class, 'candidate_voting_table')->withPivot('votes');
    }

    
}
