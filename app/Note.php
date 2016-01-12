<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Project;

/**
 * Model for notes table in database
 *
 * This model defines the notes table in the database.
 *
 * @since 1.0.0
 */
class Note extends Model
{
    /**
     * Fetches the user belonging to a note
     *
     * This function returns the user for the specified note.
     *
     * @since 1.0.0
     *
     * @return User The user for this note
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Fetches the project belonging to a note
     *
     * This function returns the project for the specified note.
     *
     * @since 1.0.0
     *
     * @return Project The project for this note
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
