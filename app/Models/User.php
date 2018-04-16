<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Team_User;
use App\Models\Team;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function team(){
        return $this->belongsToMany(Team::class,'team_users','user_id','team_id');
    }
    public function resource(){
        return $this->hasMany(Resource::class);
    }
    public function addtoteam($team_id)//加入小组
    {
        if (!is_array($team_id)) {
            $team_id = compact('team_id');
        }
        $this->team()->sync($team_id, false);
    }

}
