<?php

use App\Models\DisaggregationMethod;
use App\Repositories\DisaggregationMethodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DisaggregationMethodRepositoryTest extends TestCase
{
    use MakeDisaggregationMethodTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DisaggregationMethodRepository
     */
    protected $disaggregationMethodRepo;

    public function setUp()
    {
        parent::setUp();
        $this->disaggregationMethodRepo = App::make(DisaggregationMethodRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDisaggregationMethod()
    {
        $disaggregationMethod = $this->fakeDisaggregationMethodData();
        $createdDisaggregationMethod = $this->disaggregationMethodRepo->create($disaggregationMethod);
        $createdDisaggregationMethod = $createdDisaggregationMethod->toArray();
        $this->assertArrayHasKey('id', $createdDisaggregationMethod);
        $this->assertNotNull($createdDisaggregationMethod['id'], 'Created DisaggregationMethod must have id specified');
        $this->assertNotNull(DisaggregationMethod::find($createdDisaggregationMethod['id']), 'DisaggregationMethod with given id must be in DB');
        $this->assertModelData($disaggregationMethod, $createdDisaggregationMethod);
    }

    /**
     * @test read
     */
    public function testReadDisaggregationMethod()
    {
        $disaggregationMethod = $this->makeDisaggregationMethod();
        $dbDisaggregationMethod = $this->disaggregationMethodRepo->find($disaggregationMethod->id);
        $dbDisaggregationMethod = $dbDisaggregationMethod->toArray();
        $this->assertModelData($disaggregationMethod->toArray(), $dbDisaggregationMethod);
    }

    /**
     * @test update
     */
    public function testUpdateDisaggregationMethod()
    {
        $disaggregationMethod = $this->makeDisaggregationMethod();
        $fakeDisaggregationMethod = $this->fakeDisaggregationMethodData();
        $updatedDisaggregationMethod = $this->disaggregationMethodRepo->update($fakeDisaggregationMethod, $disaggregationMethod->id);
        $this->assertModelData($fakeDisaggregationMethod, $updatedDisaggregationMethod->toArray());
        $dbDisaggregationMethod = $this->disaggregationMethodRepo->find($disaggregationMethod->id);
        $this->assertModelData($fakeDisaggregationMethod, $dbDisaggregationMethod->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDisaggregationMethod()
    {
        $disaggregationMethod = $this->makeDisaggregationMethod();
        $resp = $this->disaggregationMethodRepo->delete($disaggregationMethod->id);
        $this->assertTrue($resp);
        $this->assertNull(DisaggregationMethod::find($disaggregationMethod->id), 'DisaggregationMethod should not exist in DB');
    }
}
