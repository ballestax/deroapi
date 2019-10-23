<?php

namespace App;

use App\VotingTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Witness extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	const ACTIVE_WITNESS = '1';
	const INACTIVE_WITNESS = '0';

     protected $fillable =[
    	'identification',
    	'firstname',
    	'lastname',
    	'phone',
    	'password',
    	'status',
    ];

    protected $hidden=[
    	'password',
    ];

    public function setFirstnameAttribute($firstname)
    {
    	$this->attributes['firstname'] = strtolower($firstname);
    }

    public function getFirstnameAttribute($firstname)
    {
    	return ucwords($firstname);
    }

    public function setLastnameAttribute($lastname)
    {
    	$this->attributes['lastname'] = strtolower($lastname);
    }

    public function getLastnameAttribute($lastname)
    {
    	return ucwords($lastname);
    }

    public function isActive()
    {
    	return $this->status == Witness::ACTIVE_WITNESS;
    }

     public function votingTables()
   {
      return $this->hasMany(VotingTable::class);
   }

}
