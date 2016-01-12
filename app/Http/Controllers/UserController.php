<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

/**
 * Controller for the user model
 *
 * This controller uses the user repository to connect to the database with
 * queries.
 *
 * @since 1.0.0
 */
class UserController extends Controller
{
    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Creates a new user controller instance.
     *
     * @param UserRepository $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Returns all users in database
     *
     * This method uses the user repository to fetch a list of all users
     * in the database and return that list.
     *
     * @since 1.0.0
     *
     * @return Response A HTTP Response object formatted as JSON
     */
    public function index()
    {
        return $this->users->listUsers();
    }
}
