<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutputApiTest extends TestCase
{
    use MakeOutputTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOutput()
    {
        $output = $this->fakeOutputData();
        $this->json('POST', '/api/v1/outputs', $output);

        $this->assertApiResponse($output);
    }

    /**
     * @test
     */
    public function testReadOutput()
    {
        $output = $this->makeOutput();
        $this->json('GET', '/api/v1/outputs/'.$output->id);

        $this->assertApiResponse($output->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOutput()
    {
        $output = $this->makeOutput();
        $editedOutput = $this->fakeOutputData();

        $this->json('PUT', '/api/v1/outputs/'.$output->id, $editedOutput);

        $this->assertApiResponse($editedOutput);
    }

    /**
     * @test
     */
    public function testDeleteOutput()
    {
        $output = $this->makeOutput();
        $this->json('DELETE', '/api/v1/outputs/'.$output->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/outputs/'.$output->id);

        $this->assertResponseStatus(404);
    }
}
