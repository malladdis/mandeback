<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeasuringUnitApiTest extends TestCase
{
    use MakeMeasuringUnitTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMeasuringUnit()
    {
        $measuringUnit = $this->fakeMeasuringUnitData();
        $this->json('POST', '/api/v1/measuringUnits', $measuringUnit);

        $this->assertApiResponse($measuringUnit);
    }

    /**
     * @test
     */
    public function testReadMeasuringUnit()
    {
        $measuringUnit = $this->makeMeasuringUnit();
        $this->json('GET', '/api/v1/measuringUnits/'.$measuringUnit->id);

        $this->assertApiResponse($measuringUnit->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMeasuringUnit()
    {
        $measuringUnit = $this->makeMeasuringUnit();
        $editedMeasuringUnit = $this->fakeMeasuringUnitData();

        $this->json('PUT', '/api/v1/measuringUnits/'.$measuringUnit->id, $editedMeasuringUnit);

        $this->assertApiResponse($editedMeasuringUnit);
    }

    /**
     * @test
     */
    public function testDeleteMeasuringUnit()
    {
        $measuringUnit = $this->makeMeasuringUnit();
        $this->json('DELETE', '/api/v1/measuringUnits/'.$measuringUnit->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/measuringUnits/'.$measuringUnit->id);

        $this->assertResponseStatus(404);
    }
}
