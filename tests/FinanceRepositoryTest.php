<?php

use App\Models\Finance;
use App\Repositories\FinanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FinanceRepositoryTest extends TestCase
{
    use MakeFinanceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FinanceRepository
     */
    protected $financeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->financeRepo = App::make(FinanceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFinance()
    {
        $finance = $this->fakeFinanceData();
        $createdFinance = $this->financeRepo->create($finance);
        $createdFinance = $createdFinance->toArray();
        $this->assertArrayHasKey('id', $createdFinance);
        $this->assertNotNull($createdFinance['id'], 'Created Finance must have id specified');
        $this->assertNotNull(Finance::find($createdFinance['id']), 'Finance with given id must be in DB');
        $this->assertModelData($finance, $createdFinance);
    }

    /**
     * @test read
     */
    public function testReadFinance()
    {
        $finance = $this->makeFinance();
        $dbFinance = $this->financeRepo->find($finance->id);
        $dbFinance = $dbFinance->toArray();
        $this->assertModelData($finance->toArray(), $dbFinance);
    }

    /**
     * @test update
     */
    public function testUpdateFinance()
    {
        $finance = $this->makeFinance();
        $fakeFinance = $this->fakeFinanceData();
        $updatedFinance = $this->financeRepo->update($fakeFinance, $finance->id);
        $this->assertModelData($fakeFinance, $updatedFinance->toArray());
        $dbFinance = $this->financeRepo->find($finance->id);
        $this->assertModelData($fakeFinance, $dbFinance->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFinance()
    {
        $finance = $this->makeFinance();
        $resp = $this->financeRepo->delete($finance->id);
        $this->assertTrue($resp);
        $this->assertNull(Finance::find($finance->id), 'Finance should not exist in DB');
    }
}
