<?php

namespace Tests\app\Infrastructure\Controller;
use App\Application\UserDataSource\UserDataSource;
use App\Domain\User;
use Illuminate\Http\Response;
use Mockery\Mock;
use Tests\TestCase;
use Mockery;

class GetUsersControllerTest extends TestCase
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
    public function thereAreNoUsers()
    {
        $this->userDataSource
            ->expects('getAll')
            ->with()
            ->andReturn([]);

        $response = $this->get('/api/users');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([]);
    }

    /**
     * @test
     */
    public function thereAreUsers()
    {
        $this->userDataSource
            ->expects('getAll')
            ->with()
            ->andReturn([
                ['id' => '1', 'email' => 'email@email.com'],
                ['id' => '2', 'email' => 'otro_email@gmail.com'],
            ]);

        $response = $this->get('/api/users');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertExactJson([
                ['id' => '1', 'email' => 'email@email.com'],
                ['id' => '2', 'email' => 'otro_email@gmail.com'],
        ]);
    }
}
