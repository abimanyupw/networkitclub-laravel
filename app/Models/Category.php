<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
     use Sluggable,HasFactory;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}