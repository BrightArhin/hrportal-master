<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kpi;

class KpiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kpi()
    {
        $kpi = factory(Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/kpis', $kpi
        );

        $this->assertApiResponse($kpi);
    }

    /**
     * @test
     */
    public function test_read_kpi()
    {
        $kpi = factory(Kpi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/kpis/'.$kpi->id
        );

        $this->assertApiResponse($kpi->toArray());
    }

    /**
     * @test
     */
    public function test_update_kpi()
    {
        $kpi = factory(Kpi::class)->create();
        $editedKpi = factory(Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/kpis/'.$kpi->id,
            $editedKpi
        );

        $this->assertApiResponse($editedKpi);
    }

    /**
     * @test
     */
    public function test_delete_kpi()
    {
        $kpi = factory(Kpi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/kpis/'.$kpi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/kpis/'.$kpi->id
        );

        $this->response->assertStatus(404);
    }
}
