<?php

use App\Models\FinancePlan;
use App\Repositories\FinancePlanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FinancePlanRepositoryTest extends TestCase
{
    use MakeFinancePlanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FinancePlanRepository
     */
    protected $financePlanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->financePlanRepo = App::make(FinancePlanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFinancePlan()
    {
        $financePlan = $this->fakeFinancePlanData();
        $createdFinancePlan = $this->financePlanRepo->create($financePlan);
        $createdFinancePlan = $createdFinancePlan->toArray();
        $this->assertArrayHasKey('id', $createdFinancePlan);
        $this->assertNotNull($createdFinancePlan['id'], 'Created FinancePlan must have id specified');
        $this->assertNotNull(FinancePlan::find($createdFinancePlan['id']), 'FinancePlan with given id must be in DB');
        $this->assertModelData($financePlan, $createdFinancePlan);
    }

    /**
     * @test read
     */
    public function testReadFinancePlan()
    {
        $financePlan = $this->makeFinancePlan();
        $dbFinancePlan = $this->financePlanRepo->find($financePlan->id);
        $dbFinancePlan = $dbFinancePlan->toArray();
        $this->assertModelData($financePlan->toArray(), $dbFinancePlan);
    }

    /**
     * @test update
     */
    public function testUpdateFinancePlan()
    {
        $financePlan = $this->makeFinancePlan();
        $fakeFinancePlan = $this->fakeFinancePlanData();
        $updatedFinancePlan = $this->financePlanRepo->update($fakeFinancePlan, $financePlan->id);
        $this->assertModelData($fakeFinancePlan, $updatedFinancePlan->toArray());
        $dbFinancePlan = $this->financePlanRepo->find($financePlan->id);
        $this->assertModelData($fakeFinancePlan, $dbFinancePlan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFinancePlan()
    {
        $financePlan = $this->makeFinancePlan();
        $resp = $this->financePlanRepo->delete($financePlan->id);
        $this->assertTrue($resp);
        $this->assertNull(FinancePlan::find($financePlan->id), 'FinancePlan should not exist in DB');
    }
}
