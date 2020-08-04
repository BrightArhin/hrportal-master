<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kpi_Role;

class Kpi_RoleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kpi__role()
    {
        $kpiRole = factory(Kpi_Role::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/kpi__roles', $kpiRole
        );

        $this->assertApiResponse($kpiRole);
    }

    /**
     * @test
     */
    public function test_read_kpi__role()
    {
        $kpiRole = factory(Kpi_Role::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/kpi__roles/'.$kpiRole->id
        );

        $this->assertApiResponse($kpiRole->toArray());
    }

    /**
     * @test
     */
    public function test_update_kpi__role()
    {
        $kpiRole = factory(Kpi_Role::class)->create();
        $editedKpi_Role = factory(Kpi_Role::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/kpi__roles/'.$kpiRole->id,
            $editedKpi_Role
        );

        $this->assertApiResponse($editedKpi_Role);
    }

    /**
     * @test
     */
    public function test_delete_kpi__role()
    {
        $kpiRole = factory(Kpi_Role::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/kpi__roles/'.$kpiRole->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/kpi__roles/'.$kpiRole->id
        );

        $this->response->assertStatus(404);
    }
}
