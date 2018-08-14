<?php

use App\Models\TimePlan;
use App\Repositories\TimePlanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TimePlanRepositoryTest extends TestCase
{
    use MakeTimePlanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TimePlanRepository
     */
    protected $timePlanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->timePlanRepo = App::make(TimePlanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTimePlan()
    {
        $timePlan = $this->fakeTimePlanData();
        $createdTimePlan = $this->timePlanRepo->create($timePlan);
        $createdTimePlan = $createdTimePlan->toArray();
        $this->assertArrayHasKey('id', $createdTimePlan);
        $this->assertNotNull($createdTimePlan['id'], 'Created TimePlan must have id specified');
        $this->assertNotNull(TimePlan::find($createdTimePlan['id']), 'TimePlan with given id must be in DB');
        $this->assertModelData($timePlan, $createdTimePlan);
    }

    /**
     * @test read
     */
    public function testReadTimePlan()
    {
        $timePlan = $this->makeTimePlan();
        $dbTimePlan = $this->timePlanRepo->find($timePlan->id);
        $dbTimePlan = $dbTimePlan->toArray();
        $this->assertModelData($timePlan->toArray(), $dbTimePlan);
    }

    /**
     * @test update
     */
    public function testUpdateTimePlan()
    {
        $timePlan = $this->makeTimePlan();
        $fakeTimePlan = $this->fakeTimePlanData();
        $updatedTimePlan = $this->timePlanRepo->update($fakeTimePlan, $timePlan->id);
        $this->assertModelData($fakeTimePlan, $updatedTimePlan->toArray());
        $dbTimePlan = $this->timePlanRepo->find($timePlan->id);
        $this->assertModelData($fakeTimePlan, $dbTimePlan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTimePlan()
    {
        $timePlan = $this->makeTimePlan();
        $resp = $this->timePlanRepo->delete($timePlan->id);
        $this->assertTrue($resp);
        $this->assertNull(TimePlan::find($timePlan->id), 'TimePlan should not exist in DB');
    }
}
