<?php

use App\Models\IndicatorDisaggregationMethod;
use App\Repositories\IndicatorDisaggregationMethodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndicatorDisaggregationMethodRepositoryTest extends TestCase
{
    use MakeIndicatorDisaggregationMethodTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IndicatorDisaggregationMethodRepository
     */
    protected $indicatorDisaggregationMethodRepo;

    public function setUp()
    {
        parent::setUp();
        $this->indicatorDisaggregationMethodRepo = App::make(IndicatorDisaggregationMethodRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->fakeIndicatorDisaggregationMethodData();
        $createdIndicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepo->create($indicatorDisaggregationMethod);
        $createdIndicatorDisaggregationMethod = $createdIndicatorDisaggregationMethod->toArray();
        $this->assertArrayHasKey('id', $createdIndicatorDisaggregationMethod);
        $this->assertNotNull($createdIndicatorDisaggregationMethod['id'], 'Created IndicatorDisaggregationMethod must have id specified');
        $this->assertNotNull(IndicatorDisaggregationMethod::find($createdIndicatorDisaggregationMethod['id']), 'IndicatorDisaggregationMethod with given id must be in DB');
        $this->assertModelData($indicatorDisaggregationMethod, $createdIndicatorDisaggregationMethod);
    }

    /**
     * @test read
     */
    public function testReadIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->makeIndicatorDisaggregationMethod();
        $dbIndicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepo->find($indicatorDisaggregationMethod->id);
        $dbIndicatorDisaggregationMethod = $dbIndicatorDisaggregationMethod->toArray();
        $this->assertModelData($indicatorDisaggregationMethod->toArray(), $dbIndicatorDisaggregationMethod);
    }

    /**
     * @test update
     */
    public function testUpdateIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->makeIndicatorDisaggregationMethod();
        $fakeIndicatorDisaggregationMethod = $this->fakeIndicatorDisaggregationMethodData();
        $updatedIndicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepo->update($fakeIndicatorDisaggregationMethod, $indicatorDisaggregationMethod->id);
        $this->assertModelData($fakeIndicatorDisaggregationMethod, $updatedIndicatorDisaggregationMethod->toArray());
        $dbIndicatorDisaggregationMethod = $this->indicatorDisaggregationMethodRepo->find($indicatorDisaggregationMethod->id);
        $this->assertModelData($fakeIndicatorDisaggregationMethod, $dbIndicatorDisaggregationMethod->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIndicatorDisaggregationMethod()
    {
        $indicatorDisaggregationMethod = $this->makeIndicatorDisaggregationMethod();
        $resp = $this->indicatorDisaggregationMethodRepo->delete($indicatorDisaggregationMethod->id);
        $this->assertTrue($resp);
        $this->assertNull(IndicatorDisaggregationMethod::find($indicatorDisaggregationMethod->id), 'IndicatorDisaggregationMethod should not exist in DB');
    }
}
