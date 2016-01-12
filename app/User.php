<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model for users table in database
 *
 * This model defines the users table in the database.
 *
 * @since 1.0.0
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Fetches the notes for a user
     *
     * This function returns the notes for the specified user.
     *
     * @since 1.0.0
     *
     * @return Note An array of all notes for this project
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
