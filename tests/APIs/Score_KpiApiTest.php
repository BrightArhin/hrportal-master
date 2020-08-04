<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Score_Kpi;

class Score_KpiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_score__kpi()
    {
        $scoreKpi = factory(Score_Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/score__kpis', $scoreKpi
        );

        $this->assertApiResponse($scoreKpi);
    }

    /**
     * @test
     */
    public function test_read_score__kpi()
    {
        $scoreKpi = factory(Score_Kpi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/score__kpis/'.$scoreKpi->id
        );

        $this->assertApiResponse($scoreKpi->toArray());
    }

    /**
     * @test
     */
    public function test_update_score__kpi()
    {
        $scoreKpi = factory(Score_Kpi::class)->create();
        $editedScore_Kpi = factory(Score_Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/score__kpis/'.$scoreKpi->id,
            $editedScore_Kpi
        );

        $this->assertApiResponse($editedScore_Kpi);
    }

    /**
     * @test
     */
    public function test_delete_score__kpi()
    {
        $scoreKpi = factory(Score_Kpi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/score__kpis/'.$scoreKpi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/score__kpis/'.$scoreKpi->id
        );

        $this->response->assertStatus(404);
    }
}
