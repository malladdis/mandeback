<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndicatorApiTest extends TestCase
{
    use MakeIndicatorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIndicator()
    {
        $indicator = $this->fakeIndicatorData();
        $this->json('POST', '/api/v1/indicators', $indicator);

        $this->assertApiResponse($indicator);
    }

    /**
     * @test
     */
    public function testReadIndicator()
    {
        $indicator = $this->makeIndicator();
        $this->json('GET', '/api/v1/indicators/'.$indicator->id);

        $this->assertApiResponse($indicator->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIndicator()
    {
        $indicator = $this->makeIndicator();
        $editedIndicator = $this->fakeIndicatorData();

        $this->json('PUT', '/api/v1/indicators/'.$indicator->id, $editedIndicator);

        $this->assertApiResponse($editedIndicator);
    }

    /**
     * @test
     */
    public function testDeleteIndicator()
    {
        $indicator = $this->makeIndicator();
        $this->json('DELETE', '/api/v1/indicators/'.$indicator->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/indicators/'.$indicator->id);

        $this->assertResponseStatus(404);
    }
}
