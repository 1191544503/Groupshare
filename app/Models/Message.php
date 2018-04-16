<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable=[
        'team_id','text'
    ];
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
