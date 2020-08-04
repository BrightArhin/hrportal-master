<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SupervisorScore;

class SupervisorScoreApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_supervisor_score()
    {
        $supervisorScore = factory(SupervisorScore::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/supervisor_scores', $supervisorScore
        );

        $this->assertApiResponse($supervisorScore);
    }

    /**
     * @test
     */
    public function test_read_supervisor_score()
    {
        $supervisorScore = factory(SupervisorScore::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/supervisor_scores/'.$supervisorScore->id
        );

        $this->assertApiResponse($supervisorScore->toArray());
    }

    /**
     * @test
     */
    public function test_update_supervisor_score()
    {
        $supervisorScore = factory(SupervisorScore::class)->create();
        $editedSupervisorScore = factory(SupervisorScore::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/supervisor_scores/'.$supervisorScore->id,
            $editedSupervisorScore
        );

        $this->assertApiResponse($editedSupervisorScore);
    }

    /**
     * @test
     */
    public function test_delete_supervisor_score()
    {
        $supervisorScore = factory(SupervisorScore::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/supervisor_scores/'.$supervisorScore->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/supervisor_scores/'.$supervisorScore->id
        );

        $this->response->assertStatus(404);
    }
}
