<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model for projects table in database
 *
 * This model defines the projects table in the database.
 *
 * @since 1.0.0
 */
class Project extends Model
{
    /**
     * Fetches the notes for a project
     *
     * This function returns the notes in the specified project.
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
