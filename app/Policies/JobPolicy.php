<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JobPolicy
{
    /**
     * Determine whether the user can edit any models.
     */
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }

    public function delete(User $user, Job $job): bool
    {
        return Auth::user()->is_admin == 1;
    }


}
