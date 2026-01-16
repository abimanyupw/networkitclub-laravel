<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    // app/Policies/UserPolicy.php

    public function before(User $authUser, $ability)
    {
        // Developer boleh SEMUA
        if ($authUser->role === 'developer') {
            return true;
        }
    }

    public function update(User $authUser, User $targetUser)
    {
        // Admin tidak boleh edit developer
        if ($authUser->role === 'admin') {
            return $targetUser->role !== 'developer';
        }

        return false;
    }

    public function delete(User $authUser, User $targetUser)
    {
        // Admin tidak boleh hapus developer
        if ($authUser->role === 'admin') {
            return $targetUser->role !== 'developer';
        }

        return false;
    }

}