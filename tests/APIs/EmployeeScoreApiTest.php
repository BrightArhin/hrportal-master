<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EmployeeScore;

class EmployeeScoreApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_employee_score()
    {
        $employeeScore = factory(EmployeeScore::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/employee_scores', $employeeScore
        );

        $this->assertApiResponse($employeeScore);
    }

    /**
     * @test
     */
    public function test_read_employee_score()
    {
        $employeeScore = factory(EmployeeScore::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/employee_scores/'.$employeeScore->id
        );

        $this->assertApiResponse($employeeScore->toArray());
    }

    /**
     * @test
     */
    public function test_update_employee_score()
    {
        $employeeScore = factory(EmployeeScore::class)->create();
        $editedEmployeeScore = factory(EmployeeScore::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/employee_scores/'.$employeeScore->id,
            $editedEmployeeScore
        );

        $this->assertApiResponse($editedEmployeeScore);
    }

    /**
     * @test
     */
    public function test_delete_employee_score()
    {
        $employeeScore = factory(EmployeeScore::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/employee_scores/'.$employeeScore->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/employee_scores/'.$employeeScore->id
        );

        $this->response->assertStatus(404);
    }
}
