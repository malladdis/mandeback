<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MonthlyExpenditureApiTest extends TestCase
{
    use MakeMonthlyExpenditureTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->fakeMonthlyExpenditureData();
        $this->json('POST', '/api/v1/monthlyExpenditures', $monthlyExpenditure);

        $this->assertApiResponse($monthlyExpenditure);
    }

    /**
     * @test
     */
    public function testReadMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->makeMonthlyExpenditure();
        $this->json('GET', '/api/v1/monthlyExpenditures/'.$monthlyExpenditure->id);

        $this->assertApiResponse($monthlyExpenditure->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->makeMonthlyExpenditure();
        $editedMonthlyExpenditure = $this->fakeMonthlyExpenditureData();

        $this->json('PUT', '/api/v1/monthlyExpenditures/'.$monthlyExpenditure->id, $editedMonthlyExpenditure);

        $this->assertApiResponse($editedMonthlyExpenditure);
    }

    /**
     * @test
     */
    public function testDeleteMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->makeMonthlyExpenditure();
        $this->json('DELETE', '/api/v1/monthlyExpenditures/'.$monthlyExpenditure->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/monthlyExpenditures/'.$monthlyExpenditure->id);

        $this->assertResponseStatus(404);
    }
}
