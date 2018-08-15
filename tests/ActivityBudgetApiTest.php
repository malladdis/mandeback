<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityBudgetApiTest extends TestCase
{
    use MakeActivityBudgetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActivityBudget()
    {
        $activityBudget = $this->fakeActivityBudgetData();
        $this->json('POST', '/api/v1/activityBudgets', $activityBudget);

        $this->assertApiResponse($activityBudget);
    }

    /**
     * @test
     */
    public function testReadActivityBudget()
    {
        $activityBudget = $this->makeActivityBudget();
        $this->json('GET', '/api/v1/activityBudgets/'.$activityBudget->id);

        $this->assertApiResponse($activityBudget->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActivityBudget()
    {
        $activityBudget = $this->makeActivityBudget();
        $editedActivityBudget = $this->fakeActivityBudgetData();

        $this->json('PUT', '/api/v1/activityBudgets/'.$activityBudget->id, $editedActivityBudget);

        $this->assertApiResponse($editedActivityBudget);
    }

    /**
     * @test
     */
    public function testDeleteActivityBudget()
    {
        $activityBudget = $this->makeActivityBudget();
        $this->json('DELETE', '/api/v1/activityBudgets/'.$activityBudget->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/activityBudgets/'.$activityBudget->id);

        $this->assertResponseStatus(404);
    }
}
