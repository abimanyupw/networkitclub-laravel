<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable; // <-- 1. Tambahkan ini

class Course extends Model
{
    use HasFactory, Sluggable; // <-- 2. Gunakan trait Sluggable di sini

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
    ];

    /**
     * Konfigurasi Sluggable
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    /**
     * Menggunakan slug sebagai kunci pencarian di Route
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}