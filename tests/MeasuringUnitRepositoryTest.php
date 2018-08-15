<?php

use App\Models\MeasuringUnit;
use App\Repositories\MeasuringUnitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeasuringUnitRepositoryTest extends TestCase
{
    use MakeMeasuringUnitTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MeasuringUnitRepository
     */
    protected $measuringUnitRepo;

    public function setUp()
    {
        parent::setUp();
        $this->measuringUnitRepo = App::make(MeasuringUnitRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMeasuringUnit()
    {
        $measuringUnit = $this->fakeMeasuringUnitData();
        $createdMeasuringUnit = $this->measuringUnitRepo->create($measuringUnit);
        $createdMeasuringUnit = $createdMeasuringUnit->toArray();
        $this->assertArrayHasKey('id', $createdMeasuringUnit);
        $this->assertNotNull($createdMeasuringUnit['id'], 'Created MeasuringUnit must have id specified');
        $this->assertNotNull(MeasuringUnit::find($createdMeasuringUnit['id']), 'MeasuringUnit with given id must be in DB');
        $this->assertModelData($measuringUnit, $createdMeasuringUnit);
    }

    /**
     * @test read
     */
    public function testReadMeasuringUnit()
    {
        $measuringUnit = $this->makeMeasuringUnit();
        $dbMeasuringUnit = $this->measuringUnitRepo->find($measuringUnit->id);
        $dbMeasuringUnit = $dbMeasuringUnit->toArray();
        $this->assertModelData($measuringUnit->toArray(), $dbMeasuringUnit);
    }

    /**
     * @test update
     */
    public function testUpdateMeasuringUnit()
    {
        $measuringUnit = $this->makeMeasuringUnit();
        $fakeMeasuringUnit = $this->fakeMeasuringUnitData();
        $updatedMeasuringUnit = $this->measuringUnitRepo->update($fakeMeasuringUnit, $measuringUnit->id);
        $this->assertModelData($fakeMeasuringUnit, $updatedMeasuringUnit->toArray());
        $dbMeasuringUnit = $this->measuringUnitRepo->find($measuringUnit->id);
        $this->assertModelData($fakeMeasuringUnit, $dbMeasuringUnit->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMeasuringUnit()
    {
        $measuringUnit = $this->makeMeasuringUnit();
        $resp = $this->measuringUnitRepo->delete($measuringUnit->id);
        $this->assertTrue($resp);
        $this->assertNull(MeasuringUnit::find($measuringUnit->id), 'MeasuringUnit should not exist in DB');
    }
}
