<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DisaggregationMethodApiTest extends TestCase
{
    use MakeDisaggregationMethodTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDisaggregationMethod()
    {
        $disaggregationMethod = $this->fakeDisaggregationMethodData();
        $this->json('POST', '/api/v1/disaggregationMethods', $disaggregationMethod);

        $this->assertApiResponse($disaggregationMethod);
    }

    /**
     * @test
     */
    public function testReadDisaggregationMethod()
    {
        $disaggregationMethod = $this->makeDisaggregationMethod();
        $this->json('GET', '/api/v1/disaggregationMethods/'.$disaggregationMethod->id);

        $this->assertApiResponse($disaggregationMethod->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDisaggregationMethod()
    {
        $disaggregationMethod = $this->makeDisaggregationMethod();
        $editedDisaggregationMethod = $this->fakeDisaggregationMethodData();

        $this->json('PUT', '/api/v1/disaggregationMethods/'.$disaggregationMethod->id, $editedDisaggregationMethod);

        $this->assertApiResponse($editedDisaggregationMethod);
    }

    /**
     * @test
     */
    public function testDeleteDisaggregationMethod()
    {
        $disaggregationMethod = $this->makeDisaggregationMethod();
        $this->json('DELETE', '/api/v1/disaggregationMethods/'.$disaggregationMethod->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/disaggregationMethods/'.$disaggregationMethod->id);

        $this->assertResponseStatus(404);
    }
}
