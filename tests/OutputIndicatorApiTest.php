<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutputIndicatorApiTest extends TestCase
{
    use MakeOutputIndicatorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOutputIndicator()
    {
        $outputIndicator = $this->fakeOutputIndicatorData();
        $this->json('POST', '/api/v1/outputIndicators', $outputIndicator);

        $this->assertApiResponse($outputIndicator);
    }

    /**
     * @test
     */
    public function testReadOutputIndicator()
    {
        $outputIndicator = $this->makeOutputIndicator();
        $this->json('GET', '/api/v1/outputIndicators/'.$outputIndicator->id);

        $this->assertApiResponse($outputIndicator->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOutputIndicator()
    {
        $outputIndicator = $this->makeOutputIndicator();
        $editedOutputIndicator = $this->fakeOutputIndicatorData();

        $this->json('PUT', '/api/v1/outputIndicators/'.$outputIndicator->id, $editedOutputIndicator);

        $this->assertApiResponse($editedOutputIndicator);
    }

    /**
     * @test
     */
    public function testDeleteOutputIndicator()
    {
        $outputIndicator = $this->makeOutputIndicator();
        $this->json('DELETE', '/api/v1/outputIndicators/'.$outputIndicator->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/outputIndicators/'.$outputIndicator->id);

        $this->assertResponseStatus(404);
    }
}
