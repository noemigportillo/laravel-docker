<?php

namespace App\Application;

class IsEarlyAdopterService
{
    public function execute(string $email): bool
    {
        $user = $this->userDataSource->findByEmail($email);
        if (is_null($user)){
            throw new UserNotFoundException();
        }

        return $user->getId()<1000;
    }

    public function __invoke(string $userEmail): JsonResponse
    {
        $isEarlyAdopter = $this->isEarlyAdopterService->execute($userEmail);

        if( ($isEarlyAdopter)){
            return response()->json([
                'early adopter' => 'El usuario es early adopter',
                Response::HTTP_OK
            ]);
        }

        return response()->json([
            'early adopter' => 'El usuario no es early adopter',
            Response::HTTP_OK
        ]);
    }
}
