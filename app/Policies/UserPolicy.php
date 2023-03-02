<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function is_profile_complete_no(User $user){
        return !$user->is_profile_complete;
    }

    public function is_profile_complete_yes(User $user){
        return $user->is_profile_complete;
    }

    public function micro_teaching_no_complete(User $user){
        return !$user->is_micro_teaching_complete;
    }

}
