<?php

use App\Models\ActivityCategory;
use App\Repositories\ActivityCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityCategoryRepositoryTest extends TestCase
{
    use MakeActivityCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActivityCategoryRepository
     */
    protected $activityCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->activityCategoryRepo = App::make(ActivityCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateActivityCategory()
    {
        $activityCategory = $this->fakeActivityCategoryData();
        $createdActivityCategory = $this->activityCategoryRepo->create($activityCategory);
        $createdActivityCategory = $createdActivityCategory->toArray();
        $this->assertArrayHasKey('id', $createdActivityCategory);
        $this->assertNotNull($createdActivityCategory['id'], 'Created ActivityCategory must have id specified');
        $this->assertNotNull(ActivityCategory::find($createdActivityCategory['id']), 'ActivityCategory with given id must be in DB');
        $this->assertModelData($activityCategory, $createdActivityCategory);
    }

    /**
     * @test read
     */
    public function testReadActivityCategory()
    {
        $activityCategory = $this->makeActivityCategory();
        $dbActivityCategory = $this->activityCategoryRepo->find($activityCategory->id);
        $dbActivityCategory = $dbActivityCategory->toArray();
        $this->assertModelData($activityCategory->toArray(), $dbActivityCategory);
    }

    /**
     * @test update
     */
    public function testUpdateActivityCategory()
    {
        $activityCategory = $this->makeActivityCategory();
        $fakeActivityCategory = $this->fakeActivityCategoryData();
        $updatedActivityCategory = $this->activityCategoryRepo->update($fakeActivityCategory, $activityCategory->id);
        $this->assertModelData($fakeActivityCategory, $updatedActivityCategory->toArray());
        $dbActivityCategory = $this->activityCategoryRepo->find($activityCategory->id);
        $this->assertModelData($fakeActivityCategory, $dbActivityCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteActivityCategory()
    {
        $activityCategory = $this->makeActivityCategory();
        $resp = $this->activityCategoryRepo->delete($activityCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ActivityCategory::find($activityCategory->id), 'ActivityCategory should not exist in DB');
    }
}
