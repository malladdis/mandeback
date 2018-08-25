<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExpenditureCategoryApiTest extends TestCase
{
    use MakeExpenditureCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateExpenditureCategory()
    {
        $expenditureCategory = $this->fakeExpenditureCategoryData();
        $this->json('POST', '/api/v1/expenditureCategories', $expenditureCategory);

        $this->assertApiResponse($expenditureCategory);
    }

    /**
     * @test
     */
    public function testReadExpenditureCategory()
    {
        $expenditureCategory = $this->makeExpenditureCategory();
        $this->json('GET', '/api/v1/expenditureCategories/'.$expenditureCategory->id);

        $this->assertApiResponse($expenditureCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateExpenditureCategory()
    {
        $expenditureCategory = $this->makeExpenditureCategory();
        $editedExpenditureCategory = $this->fakeExpenditureCategoryData();

        $this->json('PUT', '/api/v1/expenditureCategories/'.$expenditureCategory->id, $editedExpenditureCategory);

        $this->assertApiResponse($editedExpenditureCategory);
    }

    /**
     * @test
     */
    public function testDeleteExpenditureCategory()
    {
        $expenditureCategory = $this->makeExpenditureCategory();
        $this->json('DELETE', '/api/v1/expenditureCategories/'.$expenditureCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/expenditureCategories/'.$expenditureCategory->id);

        $this->assertResponseStatus(404);
    }
}
