<?php

use App\Models\ProjectBeneficiary;
use App\Repositories\ProjectBeneficiaryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectBeneficiaryRepositoryTest extends TestCase
{
    use MakeProjectBeneficiaryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectBeneficiaryRepository
     */
    protected $projectBeneficiaryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->projectBeneficiaryRepo = App::make(ProjectBeneficiaryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProjectBeneficiary()
    {
        $projectBeneficiary = $this->fakeProjectBeneficiaryData();
        $createdProjectBeneficiary = $this->projectBeneficiaryRepo->create($projectBeneficiary);
        $createdProjectBeneficiary = $createdProjectBeneficiary->toArray();
        $this->assertArrayHasKey('id', $createdProjectBeneficiary);
        $this->assertNotNull($createdProjectBeneficiary['id'], 'Created ProjectBeneficiary must have id specified');
        $this->assertNotNull(ProjectBeneficiary::find($createdProjectBeneficiary['id']), 'ProjectBeneficiary with given id must be in DB');
        $this->assertModelData($projectBeneficiary, $createdProjectBeneficiary);
    }

    /**
     * @test read
     */
    public function testReadProjectBeneficiary()
    {
        $projectBeneficiary = $this->makeProjectBeneficiary();
        $dbProjectBeneficiary = $this->projectBeneficiaryRepo->find($projectBeneficiary->id);
        $dbProjectBeneficiary = $dbProjectBeneficiary->toArray();
        $this->assertModelData($projectBeneficiary->toArray(), $dbProjectBeneficiary);
    }

    /**
     * @test update
     */
    public function testUpdateProjectBeneficiary()
    {
        $projectBeneficiary = $this->makeProjectBeneficiary();
        $fakeProjectBeneficiary = $this->fakeProjectBeneficiaryData();
        $updatedProjectBeneficiary = $this->projectBeneficiaryRepo->update($fakeProjectBeneficiary, $projectBeneficiary->id);
        $this->assertModelData($fakeProjectBeneficiary, $updatedProjectBeneficiary->toArray());
        $dbProjectBeneficiary = $this->projectBeneficiaryRepo->find($projectBeneficiary->id);
        $this->assertModelData($fakeProjectBeneficiary, $dbProjectBeneficiary->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProjectBeneficiary()
    {
        $projectBeneficiary = $this->makeProjectBeneficiary();
        $resp = $this->projectBeneficiaryRepo->delete($projectBeneficiary->id);
        $this->assertTrue($resp);
        $this->assertNull(ProjectBeneficiary::find($projectBeneficiary->id), 'ProjectBeneficiary should not exist in DB');
    }
}
