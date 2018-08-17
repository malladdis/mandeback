<?php

use App\Models\ActivityIndicator;
use App\Repositories\ActivityIndicatorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityIndicatorRepositoryTest extends TestCase
{
    use MakeActivityIndicatorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActivityIndicatorRepository
     */
    protected $activityIndicatorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->activityIndicatorRepo = App::make(ActivityIndicatorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateActivityIndicator()
    {
        $activityIndicator = $this->fakeActivityIndicatorData();
        $createdActivityIndicator = $this->activityIndicatorRepo->create($activityIndicator);
        $createdActivityIndicator = $createdActivityIndicator->toArray();
        $this->assertArrayHasKey('id', $createdActivityIndicator);
        $this->assertNotNull($createdActivityIndicator['id'], 'Created ActivityIndicator must have id specified');
        $this->assertNotNull(ActivityIndicator::find($createdActivityIndicator['id']), 'ActivityIndicator with given id must be in DB');
        $this->assertModelData($activityIndicator, $createdActivityIndicator);
    }

    /**
     * @test read
     */
    public function testReadActivityIndicator()
    {
        $activityIndicator = $this->makeActivityIndicator();
        $dbActivityIndicator = $this->activityIndicatorRepo->find($activityIndicator->id);
        $dbActivityIndicator = $dbActivityIndicator->toArray();
        $this->assertModelData($activityIndicator->toArray(), $dbActivityIndicator);
    }

    /**
     * @test update
     */
    public function testUpdateActivityIndicator()
    {
        $activityIndicator = $this->makeActivityIndicator();
        $fakeActivityIndicator = $this->fakeActivityIndicatorData();
        $updatedActivityIndicator = $this->activityIndicatorRepo->update($fakeActivityIndicator, $activityIndicator->id);
        $this->assertModelData($fakeActivityIndicator, $updatedActivityIndicator->toArray());
        $dbActivityIndicator = $this->activityIndicatorRepo->find($activityIndicator->id);
        $this->assertModelData($fakeActivityIndicator, $dbActivityIndicator->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteActivityIndicator()
    {
        $activityIndicator = $this->makeActivityIndicator();
        $resp = $this->activityIndicatorRepo->delete($activityIndicator->id);
        $this->assertTrue($resp);
        $this->assertNull(ActivityIndicator::find($activityIndicator->id), 'ActivityIndicator should not exist in DB');
    }
}
