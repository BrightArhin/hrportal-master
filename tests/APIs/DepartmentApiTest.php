<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Department;

class DepartmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_department()
    {
        $department = factory(Department::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/departments', $department
        );

        $this->assertApiResponse($department);
    }

    /**
     * @test
     */
    public function test_read_department()
    {
        $department = factory(Department::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/departments/'.$department->id
        );

        $this->assertApiResponse($department->toArray());
    }

    /**
     * @test
     */
    public function test_update_department()
    {
        $department = factory(Department::class)->create();
        $editedDepartment = factory(Department::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/departments/'.$department->id,
            $editedDepartment
        );

        $this->assertApiResponse($editedDepartment);
    }

    /**
     * @test
     */
    public function test_delete_department()
    {
        $department = factory(Department::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/departments/'.$department->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/departments/'.$department->id
        );

        $this->response->assertStatus(404);
    }
}
