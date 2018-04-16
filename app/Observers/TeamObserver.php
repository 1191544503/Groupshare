<?php

namespace App\Observers;

use App\Models\Team;
use Auth;
use App\Models\Team_User;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TeamObserver
{
    public function saving()
    {
    }
    public function created(Team $team){
        $user=Auth::user();
        $user->createcount=$user->createcount-1;
        $user->addtoteam($team->id);
        $user->save();
    }
}