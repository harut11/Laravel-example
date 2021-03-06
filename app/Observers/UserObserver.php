<?php

namespace App\Observers;

use App\User;
use App\UserDetails;

class UserObserver
{
	/**
     * Handle the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
    	$user->details()->save(new UserDetails());
    }
}
