<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FinanceApiTest extends TestCase
{
    use MakeFinanceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFinance()
    {
        $finance = $this->fakeFinanceData();
        $this->json('POST', '/api/v1/finances', $finance);

        $this->assertApiResponse($finance);
    }

    /**
     * @test
     */
    public function testReadFinance()
    {
        $finance = $this->makeFinance();
        $this->json('GET', '/api/v1/finances/'.$finance->id);

        $this->assertApiResponse($finance->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFinance()
    {
        $finance = $this->makeFinance();
        $editedFinance = $this->fakeFinanceData();

        $this->json('PUT', '/api/v1/finances/'.$finance->id, $editedFinance);

        $this->assertApiResponse($editedFinance);
    }

    /**
     * @test
     */
    public function testDeleteFinance()
    {
        $finance = $this->makeFinance();
        $this->json('DELETE', '/api/v1/finances/'.$finance->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/finances/'.$finance->id);

        $this->assertResponseStatus(404);
    }
}
