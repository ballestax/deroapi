<?php

namespace App;

use App\VotingTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class E14Card extends Model
{
 
    use SoftDeletes;

    protected $dates = ['deleted_at'];
 
    protected $fillable =[
    	'blank_votes',
    	'null_votes',
    	'unmarks_votes',
    	'total_votes',
    	'is_recount',
    	'is_incineration',
        'path',
        'voting_table_id'
    ];

    /*public function votingTable()
    {
        return $this->belongsTo(VotingTable::class);
    }*/
}
