<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramDetailApiTest extends TestCase
{
    use MakeProgramDetailTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProgramDetail()
    {
        $programDetail = $this->fakeProgramDetailData();
        $this->json('POST', '/api/v1/programDetails', $programDetail);

        $this->assertApiResponse($programDetail);
    }

    /**
     * @test
     */
    public function testReadProgramDetail()
    {
        $programDetail = $this->makeProgramDetail();
        $this->json('GET', '/api/v1/programDetails/'.$programDetail->id);

        $this->assertApiResponse($programDetail->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProgramDetail()
    {
        $programDetail = $this->makeProgramDetail();
        $editedProgramDetail = $this->fakeProgramDetailData();

        $this->json('PUT', '/api/v1/programDetails/'.$programDetail->id, $editedProgramDetail);

        $this->assertApiResponse($editedProgramDetail);
    }

    /**
     * @test
     */
    public function testDeleteProgramDetail()
    {
        $programDetail = $this->makeProgramDetail();
        $this->json('DELETE', '/api/v1/programDetails/'.$programDetail->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/programDetails/'.$programDetail->id);

        $this->assertResponseStatus(404);
    }
}
