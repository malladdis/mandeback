<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutcomeIndicatorApiTest extends TestCase
{
    use MakeOutcomeIndicatorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOutcomeIndicator()
    {
        $outcomeIndicator = $this->fakeOutcomeIndicatorData();
        $this->json('POST', '/api/v1/outcomeIndicators', $outcomeIndicator);

        $this->assertApiResponse($outcomeIndicator);
    }

    /**
     * @test
     */
    public function testReadOutcomeIndicator()
    {
        $outcomeIndicator = $this->makeOutcomeIndicator();
        $this->json('GET', '/api/v1/outcomeIndicators/'.$outcomeIndicator->id);

        $this->assertApiResponse($outcomeIndicator->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOutcomeIndicator()
    {
        $outcomeIndicator = $this->makeOutcomeIndicator();
        $editedOutcomeIndicator = $this->fakeOutcomeIndicatorData();

        $this->json('PUT', '/api/v1/outcomeIndicators/'.$outcomeIndicator->id, $editedOutcomeIndicator);

        $this->assertApiResponse($editedOutcomeIndicator);
    }

    /**
     * @test
     */
    public function testDeleteOutcomeIndicator()
    {
        $outcomeIndicator = $this->makeOutcomeIndicator();
        $this->json('DELETE', '/api/v1/outcomeIndicators/'.$outcomeIndicator->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/outcomeIndicators/'.$outcomeIndicator->id);

        $this->assertResponseStatus(404);
    }
}
