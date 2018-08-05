<?php

use App\Models\ProjectCategory;
use App\Repositories\ProjectCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectCategoryRepositoryTest extends TestCase
{
    use MakeProjectCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProjectCategoryRepository
     */
    protected $projectCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->projectCategoryRepo = App::make(ProjectCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProjectCategory()
    {
        $projectCategory = $this->fakeProjectCategoryData();
        $createdProjectCategory = $this->projectCategoryRepo->create($projectCategory);
        $createdProjectCategory = $createdProjectCategory->toArray();
        $this->assertArrayHasKey('id', $createdProjectCategory);
        $this->assertNotNull($createdProjectCategory['id'], 'Created ProjectCategory must have id specified');
        $this->assertNotNull(ProjectCategory::find($createdProjectCategory['id']), 'ProjectCategory with given id must be in DB');
        $this->assertModelData($projectCategory, $createdProjectCategory);
    }

    /**
     * @test read
     */
    public function testReadProjectCategory()
    {
        $projectCategory = $this->makeProjectCategory();
        $dbProjectCategory = $this->projectCategoryRepo->find($projectCategory->id);
        $dbProjectCategory = $dbProjectCategory->toArray();
        $this->assertModelData($projectCategory->toArray(), $dbProjectCategory);
    }

    /**
     * @test update
     */
    public function testUpdateProjectCategory()
    {
        $projectCategory = $this->makeProjectCategory();
        $fakeProjectCategory = $this->fakeProjectCategoryData();
        $updatedProjectCategory = $this->projectCategoryRepo->update($fakeProjectCategory, $projectCategory->id);
        $this->assertModelData($fakeProjectCategory, $updatedProjectCategory->toArray());
        $dbProjectCategory = $this->projectCategoryRepo->find($projectCategory->id);
        $this->assertModelData($fakeProjectCategory, $dbProjectCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProjectCategory()
    {
        $projectCategory = $this->makeProjectCategory();
        $resp = $this->projectCategoryRepo->delete($projectCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ProjectCategory::find($projectCategory->id), 'ProjectCategory should not exist in DB');
    }
}
