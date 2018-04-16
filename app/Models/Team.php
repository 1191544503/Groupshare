<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable=[
        'name','photo','describe'
    ];
    public function user(){
        return $this->belongsToMany(User::class,'team_users','team_id','user_id');
    }
    public function message(){
        return $this->hasMany(Message::class);
    }
    public function resource(){
        return $this->hasMany(Resource::class);
    }

}
