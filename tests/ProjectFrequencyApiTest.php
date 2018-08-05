<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectFrequencyApiTest extends TestCase
{
    use MakeProjectFrequencyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProjectFrequency()
    {
        $projectFrequency = $this->fakeProjectFrequencyData();
        $this->json('POST', '/api/v1/projectFrequencies', $projectFrequency);

        $this->assertApiResponse($projectFrequency);
    }

    /**
     * @test
     */
    public function testReadProjectFrequency()
    {
        $projectFrequency = $this->makeProjectFrequency();
        $this->json('GET', '/api/v1/projectFrequencies/'.$projectFrequency->id);

        $this->assertApiResponse($projectFrequency->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProjectFrequency()
    {
        $projectFrequency = $this->makeProjectFrequency();
        $editedProjectFrequency = $this->fakeProjectFrequencyData();

        $this->json('PUT', '/api/v1/projectFrequencies/'.$projectFrequency->id, $editedProjectFrequency);

        $this->assertApiResponse($editedProjectFrequency);
    }

    /**
     * @test
     */
    public function testDeleteProjectFrequency()
    {
        $projectFrequency = $this->makeProjectFrequency();
        $this->json('DELETE', '/api/v1/projectFrequencies/'.$projectFrequency->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/projectFrequencies/'.$projectFrequency->id);

        $this->assertResponseStatus(404);
    }
}
