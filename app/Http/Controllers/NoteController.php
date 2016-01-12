<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\Repositories\NoteRepository;

/**
 * Controller for the note model
 *
 * This controller has methods for returning all notes in the database,
 * returning the data in one single note, update a note, create a new note
 * or deleting a note.
 *
 * @since 1.0.0
 */
class NoteController extends Controller
{
    /**
     * The note repository instance.
     *
     * @var NoteRepository
     */
    protected $notes;

    /**
     * Creates a new note controller instance.
     *
     * @param NoteRepository $notes
     * @return void
     */
    public function __construct(NoteRepository $notes)
    {
        $this->notes = $notes;
    }

    /**
     * Returns all notes in database
     *
     * This method uses the note repository to fetch a list of all notes in the
     * database and return that list.
     *
     * @since 1.0.0
     *
     * @return Response A HTTP Response object formatted as JSON
     */
    public function index()
    {
        return $this->notes->listNotes();
    }

    /**
     * Deletes a specific note in the database
     *
     * This method uses the note repository to delete a specific note in the
     * database.
     *
     * @since 1.0.0
     *
     * @param Request $request The HTTP request with the ID of the note
     * @return int The HTTP status code
     */
    public function destroy(Request $request)
    {
        return $this->notes->deleteNote($request->id); 
    }
    
    /**
     * Returns a specific note in the database
     *
     * This method uses the note repository to get id, content, deadline and
     * completed for a specific note in the database.
     *
     * @since 1.0.0
     *
     * @param int $request The ID of the note
     * @return Response A HTTP Response object formatted as JSON
     */
    public function edit($request) 
    {
        return $this->notes->editNote($request);
    }
    
    /**
     * Updates a specific note in the database
     *
     * This method uses the note repository to update content, deadline and
     * completed for a specific note in the database.
     *
     * @since 1.0.0
     *
     * @param Request $request The HTTP request with the data of the note
     * @return int The HTTP status code
     */
    public function update(Request $request)
    {
        return $this->notes->updateNote($request); 
    }

    /**
     * Creates a note and stores it in the database
     *
     * This method uses the note repository to create a new note to the
     * database with user, project, content and deadline.
     *
     * @since 1.0.0
     *
     * @param Request $request The HTTP request with the data of the note
     * @return int The HTTP status code
     */
    public function store(Request $request)
    {
        return $this->notes->createNote($request);     
    }
}
