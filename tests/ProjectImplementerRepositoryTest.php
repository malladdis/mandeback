<?php

use App\Models\ProjectImplementer;
use App\Repositories\ProjectImplementerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectImplementerRepositoryTest extends TestCase
{
    use MakeProjectImplementerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectImplementerRepository
     */
    protected $projectImplementerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->projectImplementerRepo = App::make(ProjectImplementerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProjectImplementer()
    {
        $projectImplementer = $this->fakeProjectImplementerData();
        $createdProjectImplementer = $this->projectImplementerRepo->create($projectImplementer);
        $createdProjectImplementer = $createdProjectImplementer->toArray();
        $this->assertArrayHasKey('id', $createdProjectImplementer);
        $this->assertNotNull($createdProjectImplementer['id'], 'Created ProjectImplementer must have id specified');
        $this->assertNotNull(ProjectImplementer::find($createdProjectImplementer['id']), 'ProjectImplementer with given id must be in DB');
        $this->assertModelData($projectImplementer, $createdProjectImplementer);
    }

    /**
     * @test read
     */
    public function testReadProjectImplementer()
    {
        $projectImplementer = $this->makeProjectImplementer();
        $dbProjectImplementer = $this->projectImplementerRepo->find($projectImplementer->id);
        $dbProjectImplementer = $dbProjectImplementer->toArray();
        $this->assertModelData($projectImplementer->toArray(), $dbProjectImplementer);
    }

    /**
     * @test update
     */
    public function testUpdateProjectImplementer()
    {
        $projectImplementer = $this->makeProjectImplementer();
        $fakeProjectImplementer = $this->fakeProjectImplementerData();
        $updatedProjectImplementer = $this->projectImplementerRepo->update($fakeProjectImplementer, $projectImplementer->id);
        $this->assertModelData($fakeProjectImplementer, $updatedProjectImplementer->toArray());
        $dbProjectImplementer = $this->projectImplementerRepo->find($projectImplementer->id);
        $this->assertModelData($fakeProjectImplementer, $dbProjectImplementer->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProjectImplementer()
    {
        $projectImplementer = $this->makeProjectImplementer();
        $resp = $this->projectImplementerRepo->delete($projectImplementer->id);
        $this->assertTrue($resp);
        $this->assertNull(ProjectImplementer::find($projectImplementer->id), 'ProjectImplementer should not exist in DB');
    }
}
