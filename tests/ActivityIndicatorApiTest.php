<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityIndicatorApiTest extends TestCase
{
    use MakeActivityIndicatorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActivityIndicator()
    {
        $activityIndicator = $this->fakeActivityIndicatorData();
        $this->json('POST', '/api/v1/activityIndicators', $activityIndicator);

        $this->assertApiResponse($activityIndicator);
    }

    /**
     * @test
     */
    public function testReadActivityIndicator()
    {
        $activityIndicator = $this->makeActivityIndicator();
        $this->json('GET', '/api/v1/activityIndicators/'.$activityIndicator->id);

        $this->assertApiResponse($activityIndicator->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActivityIndicator()
    {
        $activityIndicator = $this->makeActivityIndicator();
        $editedActivityIndicator = $this->fakeActivityIndicatorData();

        $this->json('PUT', '/api/v1/activityIndicators/'.$activityIndicator->id, $editedActivityIndicator);

        $this->assertApiResponse($editedActivityIndicator);
    }

    /**
     * @test
     */
    public function testDeleteActivityIndicator()
    {
        $activityIndicator = $this->makeActivityIndicator();
        $this->json('DELETE', '/api/v1/activityIndicators/'.$activityIndicator->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/activityIndicators/'.$activityIndicator->id);

        $this->assertResponseStatus(404);
    }
}
