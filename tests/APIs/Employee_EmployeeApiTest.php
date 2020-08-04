<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Employee_Employee;

class Employee_EmployeeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_employee__employee()
    {
        $employeeEmployee = factory(Employee_Employee::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/employee__employees', $employeeEmployee
        );

        $this->assertApiResponse($employeeEmployee);
    }

    /**
     * @test
     */
    public function test_read_employee__employee()
    {
        $employeeEmployee = factory(Employee_Employee::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/employee__employees/'.$employeeEmployee->id
        );

        $this->assertApiResponse($employeeEmployee->toArray());
    }

    /**
     * @test
     */
    public function test_update_employee__employee()
    {
        $employeeEmployee = factory(Employee_Employee::class)->create();
        $editedEmployee_Employee = factory(Employee_Employee::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/employee__employees/'.$employeeEmployee->id,
            $editedEmployee_Employee
        );

        $this->assertApiResponse($editedEmployee_Employee);
    }

    /**
     * @test
     */
    public function test_delete_employee__employee()
    {
        $employeeEmployee = factory(Employee_Employee::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/employee__employees/'.$employeeEmployee->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/employee__employees/'.$employeeEmployee->id
        );

        $this->response->assertStatus(404);
    }
}
