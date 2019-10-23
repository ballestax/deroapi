<?php

namespace App;

use App\Election;
use App\VotingTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingPlace extends Model
{    
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
    	'name',
      'code',
    	'departament',
    	'municipality',
    	'zone',
      'potencial'
    ];

    public function setNameAttribute($name)
    {
      $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute($name)
    {
      return ucwords($name);
    }

   public function votingTables()
   {
   	  return $this->hasMany(VotingTable::class);
   }

   public function elections()
   {
   	  return $this->belongsToMany(Election::class);
   }

}
