<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Employee_Role;

class Employee_RoleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_employee__role()
    {
        $employeeRole = factory(Employee_Role::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/employee__roles', $employeeRole
        );

        $this->assertApiResponse($employeeRole);
    }

    /**
     * @test
     */
    public function test_read_employee__role()
    {
        $employeeRole = factory(Employee_Role::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/employee__roles/'.$employeeRole->id
        );

        $this->assertApiResponse($employeeRole->toArray());
    }

    /**
     * @test
     */
    public function test_update_employee__role()
    {
        $employeeRole = factory(Employee_Role::class)->create();
        $editedEmployee_Role = factory(Employee_Role::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/employee__roles/'.$employeeRole->id,
            $editedEmployee_Role
        );

        $this->assertApiResponse($editedEmployee_Role);
    }

    /**
     * @test
     */
    public function test_delete_employee__role()
    {
        $employeeRole = factory(Employee_Role::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/employee__roles/'.$employeeRole->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/employee__roles/'.$employeeRole->id
        );

        $this->response->assertStatus(404);
    }
}
