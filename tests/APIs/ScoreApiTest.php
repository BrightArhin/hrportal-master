<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Score;

class ScoreApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_score()
    {
        $score = factory(Score::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/scores', $score
        );

        $this->assertApiResponse($score);
    }

    /**
     * @test
     */
    public function test_read_score()
    {
        $score = factory(Score::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/scores/'.$score->id
        );

        $this->assertApiResponse($score->toArray());
    }

    /**
     * @test
     */
    public function test_update_score()
    {
        $score = factory(Score::class)->create();
        $editedScore = factory(Score::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/scores/'.$score->id,
            $editedScore
        );

        $this->assertApiResponse($editedScore);
    }

    /**
     * @test
     */
    public function test_delete_score()
    {
        $score = factory(Score::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/scores/'.$score->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/scores/'.$score->id
        );

        $this->response->assertStatus(404);
    }
}
