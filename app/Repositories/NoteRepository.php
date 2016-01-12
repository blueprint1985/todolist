<?php
namespace App\Repositories;

use App\Note;
use Response;

/**
 * Repository for the Note model
 *
 * This repository has Eloquent querys for the Note model.
 *
 * @since 1.1.0
 */
class NoteRepository 
{
    /**
     * Returns all projects in database
     *
     * This function uses an Eloquent query to return a list of id, user,
     * project, content, created, deadline and completed for all notes stored 
     * in the database.
     *
     * @since 1.1.0
     *
     * @return Response A HTTP Response object formatted as JSON
     */
    public function listNotes() {
        try {
            $statusCode = 200; 
            $notes = Note::where('removed', 0)
                ->with(['user', 'project'])
                ->orderBy('time_created', 'asc')->get();

            $response = [];

            foreach ($notes as $note) {
                $this_row = array(
                    'id' => $note->id,
                    'user' => $note->user->uname,
                    'project' => $note->project->pname,
                    'content' => $note->content,
                    'completed' => $note->completed,
                    'created' => $note->time_created,
                    'deadline' => $note->time_deadline,
                );

                $response[] = $this_row;
            }
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    /**
     * Deletes a specific note
     *
     * This function uses an Eloquent query to delete a specific note from the
     * database. A note is deleted when the column removed is set to 1 for that
     * note.
     *
     * @since 1.1.0
     *
     * @param int $noteID The ID of the note to be deleted
     * @return int The HTTP status code
     */
    public function deleteNote($noteID)
    {
        try {
            $statusCode = 200;

            $note = Note::find($noteID);
            $note->removed = 1;
            $note->save();
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return $statusCode;
        }   
    }

    /**
     * Returns data for a specific note to be shown in update form
     *
     * This function uses an Eloquent query to return id, content, deadline and
     * completed for a specific note.
     *
     * @since 1.1.0
     *
     * @param int $noteID The ID of the note to be returned
     * @return Response A HTTP Response object formatted as JSON
     */
    public function editNote($noteID)
    {
        try {
            $statusCode = 200;

            $note = Note::find($noteID);

            $response = array(
                'id' => $note->id,
                'content' => $note->content,
                'completed' => $note->completed,
                'deadline' => $note->time_deadline
            );
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    /**
     * Updates a specific note
     *
     * This function uses an Eloquent query to update content, deadline and
     * completed for a specific note.
     *
     * @since 1.1.0
     *
     * @param int $noteID The ID of the note to be updated
     * @return int The HTTP status code
     */
    public function updateNote($notedata)
    {
        try {
            $statusCode = 200;

            $note = Note::find($notedata->id);

            $note->content = $notedata->content;
            $note->time_deadline = $notedata->deadline;

            if ($notedata->completed == "true") {
                $note->completed = 1;
            } else {
                $note->completed = 0;
            }

            $note->save();
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return $statusCode;
        }
    }

    /**
     * Creates a new note
     *
     * This function uses an Eloquent query to create a new note with user,
     * project, content and deadline.
     *
     * @since 1.1.0
     *
     * @param int $noteID The ID of the note to be updated
     * @return int The HTTP status code
     */
    public function createNote($notedata)
    {
        try {
            $statusCode = 200;

            $note = new Note;
        
            $note->user_id = $notedata->user;
            $note->project_id = $notedata->project;
            $note->content = $notedata->content;
            $note->time_deadline = $notedata->deadline;

            $note->save();
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return $statusCode;
        }
    }
}