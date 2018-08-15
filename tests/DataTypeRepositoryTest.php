<?php

use App\Models\DataType;
use App\Repositories\DataTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataTypeRepositoryTest extends TestCase
{
    use MakeDataTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DataTypeRepository
     */
    protected $dataTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataTypeRepo = App::make(DataTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDataType()
    {
        $dataType = $this->fakeDataTypeData();
        $createdDataType = $this->dataTypeRepo->create($dataType);
        $createdDataType = $createdDataType->toArray();
        $this->assertArrayHasKey('id', $createdDataType);
        $this->assertNotNull($createdDataType['id'], 'Created DataType must have id specified');
        $this->assertNotNull(DataType::find($createdDataType['id']), 'DataType with given id must be in DB');
        $this->assertModelData($dataType, $createdDataType);
    }

    /**
     * @test read
     */
    public function testReadDataType()
    {
        $dataType = $this->makeDataType();
        $dbDataType = $this->dataTypeRepo->find($dataType->id);
        $dbDataType = $dbDataType->toArray();
        $this->assertModelData($dataType->toArray(), $dbDataType);
    }

    /**
     * @test update
     */
    public function testUpdateDataType()
    {
        $dataType = $this->makeDataType();
        $fakeDataType = $this->fakeDataTypeData();
        $updatedDataType = $this->dataTypeRepo->update($fakeDataType, $dataType->id);
        $this->assertModelData($fakeDataType, $updatedDataType->toArray());
        $dbDataType = $this->dataTypeRepo->find($dataType->id);
        $this->assertModelData($fakeDataType, $dbDataType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDataType()
    {
        $dataType = $this->makeDataType();
        $resp = $this->dataTypeRepo->delete($dataType->id);
        $this->assertTrue($resp);
        $this->assertNull(DataType::find($dataType->id), 'DataType should not exist in DB');
    }
}
