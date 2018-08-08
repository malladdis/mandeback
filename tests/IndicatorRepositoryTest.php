<?php

use App\Models\Indicator;
use App\Repositories\IndicatorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndicatorRepositoryTest extends TestCase
{
    use MakeIndicatorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IndicatorRepository
     */
    protected $indicatorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->indicatorRepo = App::make(IndicatorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIndicator()
    {
        $indicator = $this->fakeIndicatorData();
        $createdIndicator = $this->indicatorRepo->create($indicator);
        $createdIndicator = $createdIndicator->toArray();
        $this->assertArrayHasKey('id', $createdIndicator);
        $this->assertNotNull($createdIndicator['id'], 'Created Indicator must have id specified');
        $this->assertNotNull(Indicator::find($createdIndicator['id']), 'Indicator with given id must be in DB');
        $this->assertModelData($indicator, $createdIndicator);
    }

    /**
     * @test read
     */
    public function testReadIndicator()
    {
        $indicator = $this->makeIndicator();
        $dbIndicator = $this->indicatorRepo->find($indicator->id);
        $dbIndicator = $dbIndicator->toArray();
        $this->assertModelData($indicator->toArray(), $dbIndicator);
    }

    /**
     * @test update
     */
    public function testUpdateIndicator()
    {
        $indicator = $this->makeIndicator();
        $fakeIndicator = $this->fakeIndicatorData();
        $updatedIndicator = $this->indicatorRepo->update($fakeIndicator, $indicator->id);
        $this->assertModelData($fakeIndicator, $updatedIndicator->toArray());
        $dbIndicator = $this->indicatorRepo->find($indicator->id);
        $this->assertModelData($fakeIndicator, $dbIndicator->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIndicator()
    {
        $indicator = $this->makeIndicator();
        $resp = $this->indicatorRepo->delete($indicator->id);
        $this->assertTrue($resp);
        $this->assertNull(Indicator::find($indicator->id), 'Indicator should not exist in DB');
    }
}
