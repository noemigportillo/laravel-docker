<?php

namespace Tests\app\Infrastructure\Controller;
use App\Application\UserDataSource\UserDataSource;
use App\Domain\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Mockery;

class GetUserEarlyAdopterControllerTest extends TestCase
{
    private UserDataSource $userDataSource;
    protected function setUp(): void
    {
        parent::setUp();
        $this->userDataSource = Mockery::mock(UserDataSource::class);
        $this->app->bind(UserDataSource::class, function () {
            return $this->userDataSource;
        });
    }

    /**
     * @test
     */
    public function userWithGivenEmailDoesNotExist()
    {
        $this->userDataSource
            ->expects('findByEmail')
            ->with('email@email.com')
            ->andReturnNull();

        $response = $this->get('/api/user/early-adopter/email@email.com');

        $response->assertNotFound();
        $response->assertExactJson(['error' => 'usuario no encontrado']);
    }

    /**
     * @test
     */
    public function userIsEarlyAdopter()
    {
        $this->userDataSource
            ->expects('findByEmail')
            ->with('email@email.com')
            ->andReturn(new User(1, 'email@email.com'));

        $response = $this->get('/api/user/early-adopter/email@email.com');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson(['El usuario es early adopter']);
    }

    /**
     * @test
     */
    public function userIsNotEarlyAdopter()
    {
        $this->userDataSource
            ->expects('findByEmail')
            ->with('email@email.com')
            ->andReturn(new User(1001, 'email@email.com'));

        $response = $this->get('/api/user/early-adopter/email@email.com');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson(['El usuario no es early adopter']);
    }
}
