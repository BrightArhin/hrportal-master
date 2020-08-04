<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Qualification;

class QualificationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_qualification()
    {
        $qualification = factory(Qualification::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/qualifications', $qualification
        );

        $this->assertApiResponse($qualification);
    }

    /**
     * @test
     */
    public function test_read_qualification()
    {
        $qualification = factory(Qualification::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/qualifications/'.$qualification->id
        );

        $this->assertApiResponse($qualification->toArray());
    }

    /**
     * @test
     */
    public function test_update_qualification()
    {
        $qualification = factory(Qualification::class)->create();
        $editedQualification = factory(Qualification::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/qualifications/'.$qualification->id,
            $editedQualification
        );

        $this->assertApiResponse($editedQualification);
    }

    /**
     * @test
     */
    public function test_delete_qualification()
    {
        $qualification = factory(Qualification::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/qualifications/'.$qualification->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/qualifications/'.$qualification->id
        );

        $this->response->assertStatus(404);
    }
}
