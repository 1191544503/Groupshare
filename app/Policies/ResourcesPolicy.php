<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcesPolicy
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
    public function edit(User $user,Resource $resource){
        return $user->id===$resource->user->id;
    }
    public function destroy(User $user,Resource $resource){
        return $user->id===$resource->user->id||$user->id===$resource->team->admin_id;
    }
}
