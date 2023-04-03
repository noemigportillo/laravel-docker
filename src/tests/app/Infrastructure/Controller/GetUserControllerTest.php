<?php

namespace Tests\app\Infrastructure\Controller;
use Tests\TestCase;

class GetUserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function userWithGivenEmailDoesNotExist()
    {
        $response = $this->get('/api/user/email@email.com');

        $response->assertExactJson(['error' => 'usuario no encontrado']);
    }
}
