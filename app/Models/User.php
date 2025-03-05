<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    // Properties
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Methods
    /**
     * Get the user's short name (first name).
     *
     * @return string
     */
    public function getShortName(): string
    {
        return $this->first_name;
    }

    /**
     * Get the user's full name (first and last name).
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the user's full name, including title and middle name if available.
     *
     * @return string
     */
    public function getFullNameLong(): string
    {
        return $this->title . ' ' . $this->first_name .
               ($this->middle_name ? ' ' . $this->middle_name : '') .
                ' ' . $this->last_name;
    }

    /**
     * Get the user's short full name (first initial and last name).
     *
     * @return string
     */
    public function getFullNameShort(): string
    {
        return $this->first_name[0] . ' ' . $this->last_name;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
