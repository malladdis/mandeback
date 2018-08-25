<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExpenditureApiTest extends TestCase
{
    use MakeExpenditureTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateExpenditure()
    {
        $expenditure = $this->fakeExpenditureData();
        $this->json('POST', '/api/v1/expenditures', $expenditure);

        $this->assertApiResponse($expenditure);
    }

    /**
     * @test
     */
    public function testReadExpenditure()
    {
        $expenditure = $this->makeExpenditure();
        $this->json('GET', '/api/v1/expenditures/'.$expenditure->id);

        $this->assertApiResponse($expenditure->toArray());
    }

    /**
     * @test
     */
    public function testUpdateExpenditure()
    {
        $expenditure = $this->makeExpenditure();
        $editedExpenditure = $this->fakeExpenditureData();

        $this->json('PUT', '/api/v1/expenditures/'.$expenditure->id, $editedExpenditure);

        $this->assertApiResponse($editedExpenditure);
    }

    /**
     * @test
     */
    public function testDeleteExpenditure()
    {
        $expenditure = $this->makeExpenditure();
        $this->json('DELETE', '/api/v1/expenditures/'.$expenditure->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/expenditures/'.$expenditure->id);

        $this->assertResponseStatus(404);
    }
}
