<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
    ];

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
}