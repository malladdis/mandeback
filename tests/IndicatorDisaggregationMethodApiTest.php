<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndicatorDisaggregationMethodApiTest extends TestCase
{
    use MakeIndicatorDisaggregationMethodTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->fakeIndicatorDisaggregationMethodData();
        $this->json('POST', '/api/v1/indicatorDisaggregationMethods', $indicatorDisaggregationMethod);

        $this->assertApiResponse($indicatorDisaggregationMethod);
    }

    /**
     * @test
     */
    public function testReadIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->makeIndicatorDisaggregationMethod();
        $this->json('GET', '/api/v1/indicatorDisaggregationMethods/'.$indicatorDisaggregationMethod->id);

        $this->assertApiResponse($indicatorDisaggregationMethod->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->makeIndicatorDisaggregationMethod();
        $editedIndicatorDisaggregationMethod = $this->fakeIndicatorDisaggregationMethodData();

        $this->json('PUT', '/api/v1/indicatorDisaggregationMethods/'.$indicatorDisaggregationMethod->id, $editedIndicatorDisaggregationMethod);

        $this->assertApiResponse($editedIndicatorDisaggregationMethod);
    }

    /**
     * @test
     */
    public function testDeleteIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->makeIndicatorDisaggregationMethod();
        $this->json('DELETE', '/api/v1/indicatorDisaggregationMethods/'.$indicatorDisaggregationMethod->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/indicatorDisaggregationMethods/'.$indicatorDisaggregationMethod->id);

        $this->assertResponseStatus(404);
    }
}
