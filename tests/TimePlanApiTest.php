<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TimePlanApiTest extends TestCase
{
    use MakeTimePlanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTimePlan()
    {
        $timePlan = $this->fakeTimePlanData();
        $this->json('POST', '/api/v1/timePlans', $timePlan);

        $this->assertApiResponse($timePlan);
    }

    /**
     * @test
     */
    public function testReadTimePlan()
    {
        $timePlan = $this->makeTimePlan();
        $this->json('GET', '/api/v1/timePlans/'.$timePlan->id);

        $this->assertApiResponse($timePlan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTimePlan()
    {
        $timePlan = $this->makeTimePlan();
        $editedTimePlan = $this->fakeTimePlanData();

        $this->json('PUT', '/api/v1/timePlans/'.$timePlan->id, $editedTimePlan);

        $this->assertApiResponse($editedTimePlan);
    }

    /**
     * @test
     */
    public function testDeleteTimePlan()
    {
        $timePlan = $this->makeTimePlan();
        $this->json('DELETE', '/api/v1/timePlans/'.$timePlan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/timePlans/'.$timePlan->id);

        $this->assertResponseStatus(404);
    }
}
