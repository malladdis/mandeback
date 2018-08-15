<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityCategoryApiTest extends TestCase
{
    use MakeActivityCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActivityCategory()
    {
        $activityCategory = $this->fakeActivityCategoryData();
        $this->json('POST', '/api/v1/activityCategories', $activityCategory);

        $this->assertApiResponse($activityCategory);
    }

    /**
     * @test
     */
    public function testReadActivityCategory()
    {
        $activityCategory = $this->makeActivityCategory();
        $this->json('GET', '/api/v1/activityCategories/'.$activityCategory->id);

        $this->assertApiResponse($activityCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActivityCategory()
    {
        $activityCategory = $this->makeActivityCategory();
        $editedActivityCategory = $this->fakeActivityCategoryData();

        $this->json('PUT', '/api/v1/activityCategories/'.$activityCategory->id, $editedActivityCategory);

        $this->assertApiResponse($editedActivityCategory);
    }

    /**
     * @test
     */
    public function testDeleteActivityCategory()
    {
        $activityCategory = $this->makeActivityCategory();
        $this->json('DELETE', '/api/v1/activityCategories/'.$activityCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/activityCategories/'.$activityCategory->id);

        $this->assertResponseStatus(404);
    }
}
