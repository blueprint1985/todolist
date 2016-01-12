<?php
namespace App\Repositories;

use App\Project;
use Response;

/**
 * Repository for the Project model
 *
 * This repository has Eloquent querys for the Project model.
 *
 * @since 1.1.0
 */
class ProjectRepository 
{
    /**
     * Index method that returns all projects in database
     *
     * This function has uses an Eloquent query to return a list of ID and name
     * for all projects stored in the database.
     *
     * @since 1.1.0
     *
     * @return Response A HTTP Response object formatted as JSON
     */
    public function listProjects() {
        try {
            $statusCode = 200;
            $projects = Project::orderBy('pname', 'asc')->get();
            $response = [];

            foreach ($projects as $project) {
                $this_row = array(
                    'id' => $project->id,
                    'name' => $project->pname
                );

                $response[] = $this_row;
            }
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }
}