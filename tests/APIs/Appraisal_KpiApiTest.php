<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Appraisal_Kpi;

class Appraisal_KpiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_appraisal__kpi()
    {
        $appraisalKpi = factory(Appraisal_Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/appraisal__kpis', $appraisalKpi
        );

        $this->assertApiResponse($appraisalKpi);
    }

    /**
     * @test
     */
    public function test_read_appraisal__kpi()
    {
        $appraisalKpi = factory(Appraisal_Kpi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/appraisal__kpis/'.$appraisalKpi->id
        );

        $this->assertApiResponse($appraisalKpi->toArray());
    }

    /**
     * @test
     */
    public function test_update_appraisal__kpi()
    {
        $appraisalKpi = factory(Appraisal_Kpi::class)->create();
        $editedAppraisal_Kpi = factory(Appraisal_Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/appraisal__kpis/'.$appraisalKpi->id,
            $editedAppraisal_Kpi
        );

        $this->assertApiResponse($editedAppraisal_Kpi);
    }

    /**
     * @test
     */
    public function test_delete_appraisal__kpi()
    {
        $appraisalKpi = factory(Appraisal_Kpi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/appraisal__kpis/'.$appraisalKpi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/appraisal__kpis/'.$appraisalKpi->id
        );

        $this->response->assertStatus(404);
    }
}
