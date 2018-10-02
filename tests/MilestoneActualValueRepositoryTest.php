<?php

use App\Models\MilestoneActualValue;
use App\Repositories\MilestoneActualValueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MilestoneActualValueRepositoryTest extends TestCase
{
    use MakeMilestoneActualValueTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MilestoneActualValueRepository
     */
    protected $milestoneActualValueRepo;

    public function setUp()
    {
        parent::setUp();
        $this->milestoneActualValueRepo = App::make(MilestoneActualValueRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMilestoneActualValue()
    {
        $milestoneActualValue = $this->fakeMilestoneActualValueData();
        $createdMilestoneActualValue = $this->milestoneActualValueRepo->create($milestoneActualValue);
        $createdMilestoneActualValue = $createdMilestoneActualValue->toArray();
        $this->assertArrayHasKey('id', $createdMilestoneActualValue);
        $this->assertNotNull($createdMilestoneActualValue['id'], 'Created MilestoneActualValue must have id specified');
        $this->assertNotNull(MilestoneActualValue::find($createdMilestoneActualValue['id']), 'MilestoneActualValue with given id must be in DB');
        $this->assertModelData($milestoneActualValue, $createdMilestoneActualValue);
    }

    /**
     * @test read
     */
    public function testReadMilestoneActualValue()
    {
        $milestoneActualValue = $this->makeMilestoneActualValue();
        $dbMilestoneActualValue = $this->milestoneActualValueRepo->find($milestoneActualValue->id);
        $dbMilestoneActualValue = $dbMilestoneActualValue->toArray();
        $this->assertModelData($milestoneActualValue->toArray(), $dbMilestoneActualValue);
    }

    /**
     * @test update
     */
    public function testUpdateMilestoneActualValue()
    {
        $milestoneActualValue = $this->makeMilestoneActualValue();
        $fakeMilestoneActualValue = $this->fakeMilestoneActualValueData();
        $updatedMilestoneActualValue = $this->milestoneActualValueRepo->update($fakeMilestoneActualValue, $milestoneActualValue->id);
        $this->assertModelData($fakeMilestoneActualValue, $updatedMilestoneActualValue->toArray());
        $dbMilestoneActualValue = $this->milestoneActualValueRepo->find($milestoneActualValue->id);
        $this->assertModelData($fakeMilestoneActualValue, $dbMilestoneActualValue->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMilestoneActualValue()
    {
        $milestoneActualValue = $this->makeMilestoneActualValue();
        $resp = $this->milestoneActualValueRepo->delete($milestoneActualValue->id);
        $this->assertTrue($resp);
        $this->assertNull(MilestoneActualValue::find($milestoneActualValue->id), 'MilestoneActualValue should not exist in DB');
    }
}
