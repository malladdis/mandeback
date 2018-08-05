<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectBeneficiaryApiTest extends TestCase
{
    use MakeProjectBeneficiaryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProjectBeneficiary()
    {
        $projectBeneficiary = $this->fakeProjectBeneficiaryData();
        $this->json('POST', '/api/v1/projectBeneficiaries', $projectBeneficiary);

        $this->assertApiResponse($projectBeneficiary);
    }

    /**
     * @test
     */
    public function testReadProjectBeneficiary()
    {
        $projectBeneficiary = $this->makeProjectBeneficiary();
        $this->json('GET', '/api/v1/projectBeneficiaries/'.$projectBeneficiary->id);

        $this->assertApiResponse($projectBeneficiary->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProjectBeneficiary()
    {
        $projectBeneficiary = $this->makeProjectBeneficiary();
        $editedProjectBeneficiary = $this->fakeProjectBeneficiaryData();

        $this->json('PUT', '/api/v1/projectBeneficiaries/'.$projectBeneficiary->id, $editedProjectBeneficiary);

        $this->assertApiResponse($editedProjectBeneficiary);
    }

    /**
     * @test
     */
    public function testDeleteProjectBeneficiary()
    {
        $projectBeneficiary = $this->makeProjectBeneficiary();
        $this->json('DELETE', '/api/v1/projectBeneficiaries/'.$projectBeneficiary->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/projectBeneficiaries/'.$projectBeneficiary->id);

        $this->assertResponseStatus(404);
    }
}
