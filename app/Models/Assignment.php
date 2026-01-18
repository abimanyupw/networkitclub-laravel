<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'deadline',
        'attachment',
    ];

    /**
     * CASTING FIELD
     */
    protected $casts = [
        'deadline' => 'datetime',
    ];

    /**
     * Konfigurasi slug
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * Route model binding pakai slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relasi ke submissions
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}