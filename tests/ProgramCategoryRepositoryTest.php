<?php

use App\Models\ProgramCategory;
use App\Repositories\ProgramCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramCategoryRepositoryTest extends TestCase
{
    use MakeProgramCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProgramCategoryRepository
     */
    protected $programCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->programCategoryRepo = App::make(ProgramCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProgramCategory()
    {
        $programCategory = $this->fakeProgramCategoryData();
        $createdProgramCategory = $this->programCategoryRepo->create($programCategory);
        $createdProgramCategory = $createdProgramCategory->toArray();
        $this->assertArrayHasKey('id', $createdProgramCategory);
        $this->assertNotNull($createdProgramCategory['id'], 'Created ProgramCategory must have id specified');
        $this->assertNotNull(ProgramCategory::find($createdProgramCategory['id']), 'ProgramCategory with given id must be in DB');
        $this->assertModelData($programCategory, $createdProgramCategory);
    }

    /**
     * @test read
     */
    public function testReadProgramCategory()
    {
        $programCategory = $this->makeProgramCategory();
        $dbProgramCategory = $this->programCategoryRepo->find($programCategory->id);
        $dbProgramCategory = $dbProgramCategory->toArray();
        $this->assertModelData($programCategory->toArray(), $dbProgramCategory);
    }

    /**
     * @test update
     */
    public function testUpdateProgramCategory()
    {
        $programCategory = $this->makeProgramCategory();
        $fakeProgramCategory = $this->fakeProgramCategoryData();
        $updatedProgramCategory = $this->programCategoryRepo->update($fakeProgramCategory, $programCategory->id);
        $this->assertModelData($fakeProgramCategory, $updatedProgramCategory->toArray());
        $dbProgramCategory = $this->programCategoryRepo->find($programCategory->id);
        $this->assertModelData($fakeProgramCategory, $dbProgramCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProgramCategory()
    {
        $programCategory = $this->makeProgramCategory();
        $resp = $this->programCategoryRepo->delete($programCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ProgramCategory::find($programCategory->id), 'ProgramCategory should not exist in DB');
    }
}
