<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Information extends Model
{
    protected $table = 'informations';
    use Sluggable,HasFactory;
     public function sluggable(): array
    {
        
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        'title',
        'slug',
        'content',

    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}