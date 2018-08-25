<?php

use App\Models\ExpenditureCategory;
use App\Repositories\ExpenditureCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExpenditureCategoryRepositoryTest extends TestCase
{
    use MakeExpenditureCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ExpenditureCategoryRepository
     */
    protected $expenditureCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->expenditureCategoryRepo = App::make(ExpenditureCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateExpenditureCategory()
    {
        $expenditureCategory = $this->fakeExpenditureCategoryData();
        $createdExpenditureCategory = $this->expenditureCategoryRepo->create($expenditureCategory);
        $createdExpenditureCategory = $createdExpenditureCategory->toArray();
        $this->assertArrayHasKey('id', $createdExpenditureCategory);
        $this->assertNotNull($createdExpenditureCategory['id'], 'Created ExpenditureCategory must have id specified');
        $this->assertNotNull(ExpenditureCategory::find($createdExpenditureCategory['id']), 'ExpenditureCategory with given id must be in DB');
        $this->assertModelData($expenditureCategory, $createdExpenditureCategory);
    }

    /**
     * @test read
     */
    public function testReadExpenditureCategory()
    {
        $expenditureCategory = $this->makeExpenditureCategory();
        $dbExpenditureCategory = $this->expenditureCategoryRepo->find($expenditureCategory->id);
        $dbExpenditureCategory = $dbExpenditureCategory->toArray();
        $this->assertModelData($expenditureCategory->toArray(), $dbExpenditureCategory);
    }

    /**
     * @test update
     */
    public function testUpdateExpenditureCategory()
    {
        $expenditureCategory = $this->makeExpenditureCategory();
        $fakeExpenditureCategory = $this->fakeExpenditureCategoryData();
        $updatedExpenditureCategory = $this->expenditureCategoryRepo->update($fakeExpenditureCategory, $expenditureCategory->id);
        $this->assertModelData($fakeExpenditureCategory, $updatedExpenditureCategory->toArray());
        $dbExpenditureCategory = $this->expenditureCategoryRepo->find($expenditureCategory->id);
        $this->assertModelData($fakeExpenditureCategory, $dbExpenditureCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteExpenditureCategory()
    {
        $expenditureCategory = $this->makeExpenditureCategory();
        $resp = $this->expenditureCategoryRepo->delete($expenditureCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ExpenditureCategory::find($expenditureCategory->id), 'ExpenditureCategory should not exist in DB');
    }
}
