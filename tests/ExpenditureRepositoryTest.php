<?php

use App\Models\Expenditure;
use App\Repositories\ExpenditureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExpenditureRepositoryTest extends TestCase
{
    use MakeExpenditureTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ExpenditureRepository
     */
    protected $expenditureRepo;

    public function setUp()
    {
        parent::setUp();
        $this->expenditureRepo = App::make(ExpenditureRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateExpenditure()
    {
        $expenditure = $this->fakeExpenditureData();
        $createdExpenditure = $this->expenditureRepo->create($expenditure);
        $createdExpenditure = $createdExpenditure->toArray();
        $this->assertArrayHasKey('id', $createdExpenditure);
        $this->assertNotNull($createdExpenditure['id'], 'Created Expenditure must have id specified');
        $this->assertNotNull(Expenditure::find($createdExpenditure['id']), 'Expenditure with given id must be in DB');
        $this->assertModelData($expenditure, $createdExpenditure);
    }

    /**
     * @test read
     */
    public function testReadExpenditure()
    {
        $expenditure = $this->makeExpenditure();
        $dbExpenditure = $this->expenditureRepo->find($expenditure->id);
        $dbExpenditure = $dbExpenditure->toArray();
        $this->assertModelData($expenditure->toArray(), $dbExpenditure);
    }

    /**
     * @test update
     */
    public function testUpdateExpenditure()
    {
        $expenditure = $this->makeExpenditure();
        $fakeExpenditure = $this->fakeExpenditureData();
        $updatedExpenditure = $this->expenditureRepo->update($fakeExpenditure, $expenditure->id);
        $this->assertModelData($fakeExpenditure, $updatedExpenditure->toArray());
        $dbExpenditure = $this->expenditureRepo->find($expenditure->id);
        $this->assertModelData($fakeExpenditure, $dbExpenditure->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteExpenditure()
    {
        $expenditure = $this->makeExpenditure();
        $resp = $this->expenditureRepo->delete($expenditure->id);
        $this->assertTrue($resp);
        $this->assertNull(Expenditure::find($expenditure->id), 'Expenditure should not exist in DB');
    }
}
