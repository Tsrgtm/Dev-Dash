<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'color'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('action')
            ->wherePivot('action', 'follow');
    }

    public function hiders()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('action')
            ->wherePivot('action', 'hide');
    }
}

