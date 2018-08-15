<?php

use App\Models\ActivityBudget;
use App\Repositories\ActivityBudgetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityBudgetRepositoryTest extends TestCase
{
    use MakeActivityBudgetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActivityBudgetRepository
     */
    protected $activityBudgetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->activityBudgetRepo = App::make(ActivityBudgetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateActivityBudget()
    {
        $activityBudget = $this->fakeActivityBudgetData();
        $createdActivityBudget = $this->activityBudgetRepo->create($activityBudget);
        $createdActivityBudget = $createdActivityBudget->toArray();
        $this->assertArrayHasKey('id', $createdActivityBudget);
        $this->assertNotNull($createdActivityBudget['id'], 'Created ActivityBudget must have id specified');
        $this->assertNotNull(ActivityBudget::find($createdActivityBudget['id']), 'ActivityBudget with given id must be in DB');
        $this->assertModelData($activityBudget, $createdActivityBudget);
    }

    /**
     * @test read
     */
    public function testReadActivityBudget()
    {
        $activityBudget = $this->makeActivityBudget();
        $dbActivityBudget = $this->activityBudgetRepo->find($activityBudget->id);
        $dbActivityBudget = $dbActivityBudget->toArray();
        $this->assertModelData($activityBudget->toArray(), $dbActivityBudget);
    }

    /**
     * @test update
     */
    public function testUpdateActivityBudget()
    {
        $activityBudget = $this->makeActivityBudget();
        $fakeActivityBudget = $this->fakeActivityBudgetData();
        $updatedActivityBudget = $this->activityBudgetRepo->update($fakeActivityBudget, $activityBudget->id);
        $this->assertModelData($fakeActivityBudget, $updatedActivityBudget->toArray());
        $dbActivityBudget = $this->activityBudgetRepo->find($activityBudget->id);
        $this->assertModelData($fakeActivityBudget, $dbActivityBudget->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteActivityBudget()
    {
        $activityBudget = $this->makeActivityBudget();
        $resp = $this->activityBudgetRepo->delete($activityBudget->id);
        $this->assertTrue($resp);
        $this->assertNull(ActivityBudget::find($activityBudget->id), 'ActivityBudget should not exist in DB');
    }
}
