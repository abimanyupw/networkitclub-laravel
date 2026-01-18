<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $authUser, $ability)
    {
        // Jika return true, maka method update/delete di bawah DIABAIKAN
        if ($authUser->role === 'developer') {
            return true;
        }
        
        // Jika return null, Laravel akan lanjut mengecek method update/delete
        return null; 
    }

    public function update(User $authUser, User $targetUser)
    {
        // Admin hanya boleh edit jika targetnya BUKAN developer
        if ($authUser->role === 'admin') {
            return $targetUser->role !== 'developer';
        }

        return false;
    }

    public function delete(User $authUser, User $targetUser)
    {
        if ($authUser->role === 'admin') {
            return $targetUser->role !== 'developer';
        }

        return false;
    }
}