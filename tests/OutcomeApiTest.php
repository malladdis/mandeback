<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutcomeApiTest extends TestCase
{
    use MakeOutcomeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOutcome()
    {
        $outcome = $this->fakeOutcomeData();
        $this->json('POST', '/api/v1/outcomes', $outcome);

        $this->assertApiResponse($outcome);
    }

    /**
     * @test
     */
    public function testReadOutcome()
    {
        $outcome = $this->makeOutcome();
        $this->json('GET', '/api/v1/outcomes/'.$outcome->id);

        $this->assertApiResponse($outcome->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOutcome()
    {
        $outcome = $this->makeOutcome();
        $editedOutcome = $this->fakeOutcomeData();

        $this->json('PUT', '/api/v1/outcomes/'.$outcome->id, $editedOutcome);

        $this->assertApiResponse($editedOutcome);
    }

    /**
     * @test
     */
    public function testDeleteOutcome()
    {
        $outcome = $this->makeOutcome();
        $this->json('DELETE', '/api/v1/outcomes/'.$outcome->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/outcomes/'.$outcome->id);

        $this->assertResponseStatus(404);
    }
}
