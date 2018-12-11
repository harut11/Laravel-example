<?php

namespace App\Observers;

use App\User;
use App\UserDetails;

class UserObserver
{
    public function created(User $user)
    {
    	$user->details()->save(new UserDetails());
    }
}
