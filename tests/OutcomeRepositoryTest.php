<?php

use App\Models\Outcome;
use App\Repositories\OutcomeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutcomeRepositoryTest extends TestCase
{
    use MakeOutcomeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OutcomeRepository
     */
    protected $outcomeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->outcomeRepo = App::make(OutcomeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOutcome()
    {
        $outcome = $this->fakeOutcomeData();
        $createdOutcome = $this->outcomeRepo->create($outcome);
        $createdOutcome = $createdOutcome->toArray();
        $this->assertArrayHasKey('id', $createdOutcome);
        $this->assertNotNull($createdOutcome['id'], 'Created Outcome must have id specified');
        $this->assertNotNull(Outcome::find($createdOutcome['id']), 'Outcome with given id must be in DB');
        $this->assertModelData($outcome, $createdOutcome);
    }

    /**
     * @test read
     */
    public function testReadOutcome()
    {
        $outcome = $this->makeOutcome();
        $dbOutcome = $this->outcomeRepo->find($outcome->id);
        $dbOutcome = $dbOutcome->toArray();
        $this->assertModelData($outcome->toArray(), $dbOutcome);
    }

    /**
     * @test update
     */
    public function testUpdateOutcome()
    {
        $outcome = $this->makeOutcome();
        $fakeOutcome = $this->fakeOutcomeData();
        $updatedOutcome = $this->outcomeRepo->update($fakeOutcome, $outcome->id);
        $this->assertModelData($fakeOutcome, $updatedOutcome->toArray());
        $dbOutcome = $this->outcomeRepo->find($outcome->id);
        $this->assertModelData($fakeOutcome, $dbOutcome->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOutcome()
    {
        $outcome = $this->makeOutcome();
        $resp = $this->outcomeRepo->delete($outcome->id);
        $this->assertTrue($resp);
        $this->assertNull(Outcome::find($outcome->id), 'Outcome should not exist in DB');
    }
}
