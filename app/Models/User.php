<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Events\Registered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Events\UserCreated;


use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    protected $mediaSingleCollections = ['avatar'];
    // protected $dispatchesEvents = [
    //     'created' => UserCreated::class,
    // ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
        'password' => 'hashed',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function seller()
    {
        return $this->hasMany(Seller::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    // public static function boot()
    // {
    //     parent::boot();

    //     // Викликайте подію Registered при створенні нового користувача
    //     static::created(function ($user) {
    //         event(new Registered($user));
    //     });
    // }
    // public static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($user) {
    //         dd('create', $user);
    //     });
    // }
}
