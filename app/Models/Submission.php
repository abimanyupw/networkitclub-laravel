<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'assignment_submissions';

    protected $fillable = [
        'assignment_id',
        'user_id',
        'content',
        'file',          // ✅ file (path disimpan di sini)
        'score',
        'feedback',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    /* ================= RELATION ================= */

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}