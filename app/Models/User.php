<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravelista\Comments\Commenter;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'position_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => "https://www.gravatar.com/avatar/".md5(strtolower($this->email))."?s=100&r=g"
        );
    }

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'worker_id');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, 'worker_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
