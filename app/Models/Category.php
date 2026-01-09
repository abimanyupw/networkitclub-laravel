<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
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