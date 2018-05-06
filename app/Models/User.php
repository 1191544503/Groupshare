<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

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
    use Notifiable {
        notify as protected laravelNotify;
    }

    public function team(){
        return $this->belongsToMany(Team::class,'team_users','user_id','team_id');
    }
    public function resource(){
        return $this->hasMany(Resource::class);
    }

    public function notify($instance)
    {
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }
    public function marskread(){
        $this->notification_count=$this->notification_count-1;
        $this->save();
    }

}
