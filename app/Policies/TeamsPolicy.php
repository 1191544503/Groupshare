<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function isadmin(User $user,Team $team)
    {
        return $user->id===$team->admin_id;
    }
    public function isexist(User $user,Team $team)
    {
        $flag=0;
        $teams=$user->team()->get();
       // dd($teams);
        foreach ($teams as $li){

            if($li->id==$team->id) {
               // dd($team->id);
                $flag = 1;
            }
        }
        if($flag)
            return true;
        else
            return false;
    }
}
