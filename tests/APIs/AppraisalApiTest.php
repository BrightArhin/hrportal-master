<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Appraisal;

class AppraisalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_appraisal()
    {
        $appraisal = factory(Appraisal::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/appraisals', $appraisal
        );

        $this->assertApiResponse($appraisal);
    }

    /**
     * @test
     */
    public function test_read_appraisal()
    {
        $appraisal = factory(Appraisal::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/appraisals/'.$appraisal->id
        );

        $this->assertApiResponse($appraisal->toArray());
    }

    /**
     * @test
     */
    public function test_update_appraisal()
    {
        $appraisal = factory(Appraisal::class)->create();
        $editedAppraisal = factory(Appraisal::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/appraisals/'.$appraisal->id,
            $editedAppraisal
        );

        $this->assertApiResponse($editedAppraisal);
    }

    /**
     * @test
     */
    public function test_delete_appraisal()
    {
        $appraisal = factory(Appraisal::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/appraisals/'.$appraisal->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/appraisals/'.$appraisal->id
        );

        $this->response->assertStatus(404);
    }
}
