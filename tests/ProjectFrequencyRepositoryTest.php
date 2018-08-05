<?php

use App\Models\ProjectFrequency;
use App\Repositories\ProjectFrequencyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectFrequencyRepositoryTest extends TestCase
{
    use MakeProjectFrequencyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectFrequencyRepository
     */
    protected $projectFrequencyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->projectFrequencyRepo = App::make(ProjectFrequencyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProjectFrequency()
    {
        $projectFrequency = $this->fakeProjectFrequencyData();
        $createdProjectFrequency = $this->projectFrequencyRepo->create($projectFrequency);
        $createdProjectFrequency = $createdProjectFrequency->toArray();
        $this->assertArrayHasKey('id', $createdProjectFrequency);
        $this->assertNotNull($createdProjectFrequency['id'], 'Created ProjectFrequency must have id specified');
        $this->assertNotNull(ProjectFrequency::find($createdProjectFrequency['id']), 'ProjectFrequency with given id must be in DB');
        $this->assertModelData($projectFrequency, $createdProjectFrequency);
    }

    /**
     * @test read
     */
    public function testReadProjectFrequency()
    {
        $projectFrequency = $this->makeProjectFrequency();
        $dbProjectFrequency = $this->projectFrequencyRepo->find($projectFrequency->id);
        $dbProjectFrequency = $dbProjectFrequency->toArray();
        $this->assertModelData($projectFrequency->toArray(), $dbProjectFrequency);
    }

    /**
     * @test update
     */
    public function testUpdateProjectFrequency()
    {
        $projectFrequency = $this->makeProjectFrequency();
        $fakeProjectFrequency = $this->fakeProjectFrequencyData();
        $updatedProjectFrequency = $this->projectFrequencyRepo->update($fakeProjectFrequency, $projectFrequency->id);
        $this->assertModelData($fakeProjectFrequency, $updatedProjectFrequency->toArray());
        $dbProjectFrequency = $this->projectFrequencyRepo->find($projectFrequency->id);
        $this->assertModelData($fakeProjectFrequency, $dbProjectFrequency->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProjectFrequency()
    {
        $projectFrequency = $this->makeProjectFrequency();
        $resp = $this->projectFrequencyRepo->delete($projectFrequency->id);
        $this->assertTrue($resp);
        $this->assertNull(ProjectFrequency::find($projectFrequency->id), 'ProjectFrequency should not exist in DB');
    }
}
