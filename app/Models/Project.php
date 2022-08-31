<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Project extends Model
{
    use HasFactory, Commentable;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('position');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
