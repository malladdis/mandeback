<?php

use App\Models\OutputIndicator;
use App\Repositories\OutputIndicatorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutputIndicatorRepositoryTest extends TestCase
{
    use MakeOutputIndicatorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OutputIndicatorRepository
     */
    protected $outputIndicatorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->outputIndicatorRepo = App::make(OutputIndicatorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOutputIndicator()
    {
        $outputIndicator = $this->fakeOutputIndicatorData();
        $createdOutputIndicator = $this->outputIndicatorRepo->create($outputIndicator);
        $createdOutputIndicator = $createdOutputIndicator->toArray();
        $this->assertArrayHasKey('id', $createdOutputIndicator);
        $this->assertNotNull($createdOutputIndicator['id'], 'Created OutputIndicator must have id specified');
        $this->assertNotNull(OutputIndicator::find($createdOutputIndicator['id']), 'OutputIndicator with given id must be in DB');
        $this->assertModelData($outputIndicator, $createdOutputIndicator);
    }

    /**
     * @test read
     */
    public function testReadOutputIndicator()
    {
        $outputIndicator = $this->makeOutputIndicator();
        $dbOutputIndicator = $this->outputIndicatorRepo->find($outputIndicator->id);
        $dbOutputIndicator = $dbOutputIndicator->toArray();
        $this->assertModelData($outputIndicator->toArray(), $dbOutputIndicator);
    }

    /**
     * @test update
     */
    public function testUpdateOutputIndicator()
    {
        $outputIndicator = $this->makeOutputIndicator();
        $fakeOutputIndicator = $this->fakeOutputIndicatorData();
        $updatedOutputIndicator = $this->outputIndicatorRepo->update($fakeOutputIndicator, $outputIndicator->id);
        $this->assertModelData($fakeOutputIndicator, $updatedOutputIndicator->toArray());
        $dbOutputIndicator = $this->outputIndicatorRepo->find($outputIndicator->id);
        $this->assertModelData($fakeOutputIndicator, $dbOutputIndicator->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOutputIndicator()
    {
        $outputIndicator = $this->makeOutputIndicator();
        $resp = $this->outputIndicatorRepo->delete($outputIndicator->id);
        $this->assertTrue($resp);
        $this->assertNull(OutputIndicator::find($outputIndicator->id), 'OutputIndicator should not exist in DB');
    }
}
