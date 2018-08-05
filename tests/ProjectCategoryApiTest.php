<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectCategoryApiTest extends TestCase
{
    use MakeProjectCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProjectCategory()
    {
        $projectCategory = $this->fakeProjectCategoryData();
        $this->json('POST', '/api/v1/projectCategories', $projectCategory);

        $this->assertApiResponse($projectCategory);
    }

    /**
     * @test
     */
    public function testReadProjectCategory()
    {
        $projectCategory = $this->makeProjectCategory();
        $this->json('GET', '/api/v1/projectCategories/'.$projectCategory->id);

        $this->assertApiResponse($projectCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProjectCategory()
    {
        $projectCategory = $this->makeProjectCategory();
        $editedProjectCategory = $this->fakeProjectCategoryData();

        $this->json('PUT', '/api/v1/projectCategories/'.$projectCategory->id, $editedProjectCategory);

        $this->assertApiResponse($editedProjectCategory);
    }

    /**
     * @test
     */
    public function testDeleteProjectCategory()
    {
        $projectCategory = $this->makeProjectCategory();
        $this->json('DELETE', '/api/v1/projectCategories/'.$projectCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/projectCategories/'.$projectCategory->id);

        $this->assertResponseStatus(404);
    }
}
