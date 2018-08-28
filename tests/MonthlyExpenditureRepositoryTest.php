<?php

use App\Models\MonthlyExpenditure;
use App\Repositories\MonthlyExpenditureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MonthlyExpenditureRepositoryTest extends TestCase
{
    use MakeMonthlyExpenditureTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MonthlyExpenditureRepository
     */
    protected $monthlyExpenditureRepo;

    public function setUp()
    {
        parent::setUp();
        $this->monthlyExpenditureRepo = App::make(MonthlyExpenditureRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->fakeMonthlyExpenditureData();
        $createdMonthlyExpenditure = $this->monthlyExpenditureRepo->create($monthlyExpenditure);
        $createdMonthlyExpenditure = $createdMonthlyExpenditure->toArray();
        $this->assertArrayHasKey('id', $createdMonthlyExpenditure);
        $this->assertNotNull($createdMonthlyExpenditure['id'], 'Created MonthlyExpenditure must have id specified');
        $this->assertNotNull(MonthlyExpenditure::find($createdMonthlyExpenditure['id']), 'MonthlyExpenditure with given id must be in DB');
        $this->assertModelData($monthlyExpenditure, $createdMonthlyExpenditure);
    }

    /**
     * @test read
     */
    public function testReadMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->makeMonthlyExpenditure();
        $dbMonthlyExpenditure = $this->monthlyExpenditureRepo->find($monthlyExpenditure->id);
        $dbMonthlyExpenditure = $dbMonthlyExpenditure->toArray();
        $this->assertModelData($monthlyExpenditure->toArray(), $dbMonthlyExpenditure);
    }

    /**
     * @test update
     */
    public function testUpdateMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->makeMonthlyExpenditure();
        $fakeMonthlyExpenditure = $this->fakeMonthlyExpenditureData();
        $updatedMonthlyExpenditure = $this->monthlyExpenditureRepo->update($fakeMonthlyExpenditure, $monthlyExpenditure->id);
        $this->assertModelData($fakeMonthlyExpenditure, $updatedMonthlyExpenditure->toArray());
        $dbMonthlyExpenditure = $this->monthlyExpenditureRepo->find($monthlyExpenditure->id);
        $this->assertModelData($fakeMonthlyExpenditure, $dbMonthlyExpenditure->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMonthlyExpenditure()
    {
        $monthlyExpenditure = $this->makeMonthlyExpenditure();
        $resp = $this->monthlyExpenditureRepo->delete($monthlyExpenditure->id);
        $this->assertTrue($resp);
        $this->assertNull(MonthlyExpenditure::find($monthlyExpenditure->id), 'MonthlyExpenditure should not exist in DB');
    }
}
