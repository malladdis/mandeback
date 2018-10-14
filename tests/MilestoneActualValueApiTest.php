<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MilestoneActualValueApiTest extends TestCase
{
    use MakeMilestoneActualValueTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMilestoneActualValue()
    {
        $milestoneActualValue = $this->fakeMilestoneActualValueData();
        $this->json('POST', '/api/v1/milestoneActualValues', $milestoneActualValue);

        $this->assertApiResponse($milestoneActualValue);
    }

    /**
     * @test
     */
    public function testReadMilestoneActualValue()
    {
        $milestoneActualValue = $this->makeMilestoneActualValue();
        $this->json('GET', '/api/v1/milestoneActualValues/'.$milestoneActualValue->id);

        $this->assertApiResponse($milestoneActualValue->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMilestoneActualValue()
    {
        $milestoneActualValue = $this->makeMilestoneActualValue();
        $editedMilestoneActualValue = $this->fakeMilestoneActualValueData();

        $this->json('PUT', '/api/v1/milestoneActualValues/'.$milestoneActualValue->id, $editedMilestoneActualValue);

        $this->assertApiResponse($editedMilestoneActualValue);
    }

    /**
     * @test
     */
    public function testDeleteMilestoneActualValue()
    {
        $milestoneActualValue = $this->makeMilestoneActualValue();
        $this->json('DELETE', '/api/v1/milestoneActualValues/'.$milestoneActualValue->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/milestoneActualValues/'.$milestoneActualValue->id);

        $this->assertResponseStatus(404);
    }
}
