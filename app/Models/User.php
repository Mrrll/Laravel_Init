<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * This is a PHP function that returns an Attribute object with a password setter that hashes the
     * input value using the Hash::make() method.
     *
     * @return Attribute A password attribute is being returned. The password attribute is created
     * using the `Attribute::make()` method and has a setter function that hashes the password using
     * Laravel's `Hash::make()` method.
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::make($value),
        );
    }

    // Relación uno a uno
    /**
     * This PHP function returns a hasOne relationship with the Setting model.
     *
     * @return A relationship between the current model and the `Setting` model is being returned.
     * Specifically, a `hasOne` relationship is being defined, indicating that the current model has
     * one associated `Setting` model.
     */
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    /**
     * This PHP function returns a one-to-one relationship between the current object and a Profile
     * object.
     *
     * @return A relationship between the current model and the `Profile` model is being returned.
     * Specifically, a one-to-one relationship is being defined using the `hasOne` method.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
