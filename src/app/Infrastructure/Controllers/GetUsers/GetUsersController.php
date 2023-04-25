<?php

namespace App\Infrastructure\Controllers\GetUsers;

use App\Application\UserDataSource\UserDataSource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class GetUsersController extends BaseController
{
    private UserDataSource $userDataSource;

    /**
     * @param UserDataSource $userDataSource
     */
    public function __construct(UserDataSource $userDataSource)
    {
        $this->userDataSource = $userDataSource;
    }


    public function __invoke(): JsonResponse
    {
        $users = $this->userDataSource->getAll();
        return response()->json($users, Response::HTTP_OK);
    }
}
