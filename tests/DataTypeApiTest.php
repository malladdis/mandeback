<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataTypeApiTest extends TestCase
{
    use MakeDataTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDataType()
    {
        $dataType = $this->fakeDataTypeData();
        $this->json('POST', '/api/v1/dataTypes', $dataType);

        $this->assertApiResponse($dataType);
    }

    /**
     * @test
     */
    public function testReadDataType()
    {
        $dataType = $this->makeDataType();
        $this->json('GET', '/api/v1/dataTypes/'.$dataType->id);

        $this->assertApiResponse($dataType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDataType()
    {
        $dataType = $this->makeDataType();
        $editedDataType = $this->fakeDataTypeData();

        $this->json('PUT', '/api/v1/dataTypes/'.$dataType->id, $editedDataType);

        $this->assertApiResponse($editedDataType);
    }

    /**
     * @test
     */
    public function testDeleteDataType()
    {
        $dataType = $this->makeDataType();
        $this->json('DELETE', '/api/v1/dataTypes/'.$dataType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataTypes/'.$dataType->id);

        $this->assertResponseStatus(404);
    }
}
