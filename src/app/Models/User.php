<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'remember_token',
        'created_at',
        'updated_at',
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

    public function applications()
{
    return $this->hasMany(Application::class);
}

public function eventReports()
{
    return $this->hasMany(EventReport::class, 'created_by');
}

public function likes()
{
    return $this->hasMany(Like::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function payments()
{
    return $this->hasMany(Payment::class);
}

public function isAdmin(): bool
{
    return $this->role === 'admin';
}

// app/Models/User.php

public function member()
{
    return $this->hasOne(Member::class);
}

public function isMember(): bool
{
    return $this->member()->exists();
}

public function activities()
{
    return $this->hasMany(Activity::class, 'created_by');
}

public function likedActivities()
{
    return $this->belongsToMany(Activity::class, 'likes');
}

}
