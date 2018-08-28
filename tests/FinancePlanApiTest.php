<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FinancePlanApiTest extends TestCase
{
    use MakeFinancePlanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFinancePlan()
    {
        $financePlan = $this->fakeFinancePlanData();
        $this->json('POST', '/api/v1/financePlans', $financePlan);

        $this->assertApiResponse($financePlan);
    }

    /**
     * @test
     */
    public function testReadFinancePlan()
    {
        $financePlan = $this->makeFinancePlan();
        $this->json('GET', '/api/v1/financePlans/'.$financePlan->id);

        $this->assertApiResponse($financePlan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFinancePlan()
    {
        $financePlan = $this->makeFinancePlan();
        $editedFinancePlan = $this->fakeFinancePlanData();

        $this->json('PUT', '/api/v1/financePlans/'.$financePlan->id, $editedFinancePlan);

        $this->assertApiResponse($editedFinancePlan);
    }

    /**
     * @test
     */
    public function testDeleteFinancePlan()
    {
        $financePlan = $this->makeFinancePlan();
        $this->json('DELETE', '/api/v1/financePlans/'.$financePlan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/financePlans/'.$financePlan->id);

        $this->assertResponseStatus(404);
    }
}
