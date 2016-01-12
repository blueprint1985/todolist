<?php
namespace App\Repositories;

use App\User;
use Response;

/**
 * Repository for the User model
 *
 * This repository has Eloquent querys for the User model.
 *
 * @since 1.1.0
 */
class UserRepository 
{
    /**
     * Index method that returns all users in database
     *
     * This function has uses an Eloquent query to return a list of ID and name
     * for all users stored in the database.
     *
     * @since 1.1.0
     *
     * @return Response A HTTP Response object formatted as JSON
     */
    public function listUsers() {
        try {
            $statusCode = 200;
            $users = User::orderBy('uname', 'asc')->get();
            $response = [];

            foreach ($users as $user) {
                $this_row = array(
                    'id' => $user->id,
                    'name' => $user->uname
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