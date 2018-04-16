<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $fillale=[
        'name','introduce','user_id','team_id','url'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
