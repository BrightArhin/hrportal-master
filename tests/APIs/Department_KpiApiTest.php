<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Department_Kpi;

class Department_KpiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_department__kpi()
    {
        $departmentKpi = factory(Department_Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/department__kpis', $departmentKpi
        );

        $this->assertApiResponse($departmentKpi);
    }

    /**
     * @test
     */
    public function test_read_department__kpi()
    {
        $departmentKpi = factory(Department_Kpi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/department__kpis/'.$departmentKpi->id
        );

        $this->assertApiResponse($departmentKpi->toArray());
    }

    /**
     * @test
     */
    public function test_update_department__kpi()
    {
        $departmentKpi = factory(Department_Kpi::class)->create();
        $editedDepartment_Kpi = factory(Department_Kpi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/department__kpis/'.$departmentKpi->id,
            $editedDepartment_Kpi
        );

        $this->assertApiResponse($editedDepartment_Kpi);
    }

    /**
     * @test
     */
    public function test_delete_department__kpi()
    {
        $departmentKpi = factory(Department_Kpi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/department__kpis/'.$departmentKpi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/department__kpis/'.$departmentKpi->id
        );

        $this->response->assertStatus(404);
    }
}
