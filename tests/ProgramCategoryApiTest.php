<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramCategoryApiTest extends TestCase
{
    use MakeProgramCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProgramCategory()
    {
        $programCategory = $this->fakeProgramCategoryData();
        $this->json('POST', '/api/v1/programCategories', $programCategory);

        $this->assertApiResponse($programCategory);
    }

    /**
     * @test
     */
    public function testReadProgramCategory()
    {
        $programCategory = $this->makeProgramCategory();
        $this->json('GET', '/api/v1/programCategories/'.$programCategory->id);

        $this->assertApiResponse($programCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProgramCategory()
    {
        $programCategory = $this->makeProgramCategory();
        $editedProgramCategory = $this->fakeProgramCategoryData();

        $this->json('PUT', '/api/v1/programCategories/'.$programCategory->id, $editedProgramCategory);

        $this->assertApiResponse($editedProgramCategory);
    }

    /**
     * @test
     */
    public function testDeleteProgramCategory()
    {
        $programCategory = $this->makeProgramCategory();
        $this->json('DELETE', '/api/v1/programCategories/'.$programCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/programCategories/'.$programCategory->id);

        $this->assertResponseStatus(404);
    }
}
