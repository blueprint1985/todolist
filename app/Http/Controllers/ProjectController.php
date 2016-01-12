<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;


/**
 * Controller for the Project model
 *
 * This controller uses the project repository to connect to the database with
 * queries.
 *
 * @since 1.0.0
 */
class ProjectController extends Controller
{
    /**
     * The project repository instance.
     *
     * @var ProjectRepository
     */
    protected $projects;

    /**
     * Creates a new project controller instance.
     *
     * @param ProjectRepository $projects
     * @return void
     */
    public function __construct(ProjectRepository $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Returns all projects in database
     *
     * This method uses the project repository to fetch a list of all projects
     * in the database and return that list.
     *
     * @since 1.0.0
     *
     * @return Response A HTTP Response object formatted as JSON
     */
    public function index()
    {
        return $this->projects->listProjects();
    }
}
