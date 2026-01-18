<?php


namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Logic ini akan dijalankan paling pertama.
     */
    public function before(User $user, $ability)
    {
        // Jika user adalah developer, bypass semua pengecekan (selalu boleh)
        if ($user->role === 'developer') {
            return true;
        }
    }

    public function update(User $user, Course $course)
    {
        // Admin boleh update
        return $user->role === 'admin';
    }

    public function delete(User $user, Course $course)
    {
        return $user->role === 'admin';
    }
}