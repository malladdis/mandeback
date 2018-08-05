<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectImplementerApiTest extends TestCase
{
    use MakeProjectImplementerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProjectImplementer()
    {
        $projectImplementer = $this->fakeProjectImplementerData();
        $this->json('POST', '/api/v1/projectImplementers', $projectImplementer);

        $this->assertApiResponse($projectImplementer);
    }

    /**
     * @test
     */
    public function testReadProjectImplementer()
    {
        $projectImplementer = $this->makeProjectImplementer();
        $this->json('GET', '/api/v1/projectImplementers/'.$projectImplementer->id);

        $this->assertApiResponse($projectImplementer->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProjectImplementer()
    {
        $projectImplementer = $this->makeProjectImplementer();
        $editedProjectImplementer = $this->fakeProjectImplementerData();

        $this->json('PUT', '/api/v1/projectImplementers/'.$projectImplementer->id, $editedProjectImplementer);

        $this->assertApiResponse($editedProjectImplementer);
    }

    /**
     * @test
     */
    public function testDeleteProjectImplementer()
    {
        $projectImplementer = $this->makeProjectImplementer();
        $this->json('DELETE', '/api/v1/projectImplementers/'.$projectImplementer->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/projectImplementers/'.$projectImplementer->id);

        $this->assertResponseStatus(404);
    }
}
