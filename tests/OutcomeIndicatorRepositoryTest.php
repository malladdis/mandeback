<?php

use App\Models\OutcomeIndicator;
use App\Repositories\OutcomeIndicatorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutcomeIndicatorRepositoryTest extends TestCase
{
    use MakeOutcomeIndicatorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OutcomeIndicatorRepository
     */
    protected $outcomeIndicatorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->outcomeIndicatorRepo = App::make(OutcomeIndicatorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOutcomeIndicator()
    {
        $outcomeIndicator = $this->fakeOutcomeIndicatorData();
        $createdOutcomeIndicator = $this->outcomeIndicatorRepo->create($outcomeIndicator);
        $createdOutcomeIndicator = $createdOutcomeIndicator->toArray();
        $this->assertArrayHasKey('id', $createdOutcomeIndicator);
        $this->assertNotNull($createdOutcomeIndicator['id'], 'Created OutcomeIndicator must have id specified');
        $this->assertNotNull(OutcomeIndicator::find($createdOutcomeIndicator['id']), 'OutcomeIndicator with given id must be in DB');
        $this->assertModelData($outcomeIndicator, $createdOutcomeIndicator);
    }

    /**
     * @test read
     */
    public function testReadOutcomeIndicator()
    {
        $outcomeIndicator = $this->makeOutcomeIndicator();
        $dbOutcomeIndicator = $this->outcomeIndicatorRepo->find($outcomeIndicator->id);
        $dbOutcomeIndicator = $dbOutcomeIndicator->toArray();
        $this->assertModelData($outcomeIndicator->toArray(), $dbOutcomeIndicator);
    }

    /**
     * @test update
     */
    public function testUpdateOutcomeIndicator()
    {
        $outcomeIndicator = $this->makeOutcomeIndicator();
        $fakeOutcomeIndicator = $this->fakeOutcomeIndicatorData();
        $updatedOutcomeIndicator = $this->outcomeIndicatorRepo->update($fakeOutcomeIndicator, $outcomeIndicator->id);
        $this->assertModelData($fakeOutcomeIndicator, $updatedOutcomeIndicator->toArray());
        $dbOutcomeIndicator = $this->outcomeIndicatorRepo->find($outcomeIndicator->id);
        $this->assertModelData($fakeOutcomeIndicator, $dbOutcomeIndicator->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOutcomeIndicator()
    {
        $outcomeIndicator = $this->makeOutcomeIndicator();
        $resp = $this->outcomeIndicatorRepo->delete($outcomeIndicator->id);
        $this->assertTrue($resp);
        $this->assertNull(OutcomeIndicator::find($outcomeIndicator->id), 'OutcomeIndicator should not exist in DB');
    }
}
