<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DonorApiTest extends TestCase
{
    use MakeDonorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDonor()
    {
        $donor = $this->fakeDonorData();
        $this->json('POST', '/api/v1/donors', $donor);

        $this->assertApiResponse($donor);
    }

    /**
     * @test
     */
    public function testReadDonor()
    {
        $donor = $this->makeDonor();
        $this->json('GET', '/api/v1/donors/'.$donor->id);

        $this->assertApiResponse($donor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDonor()
    {
        $donor = $this->makeDonor();
        $editedDonor = $this->fakeDonorData();

        $this->json('PUT', '/api/v1/donors/'.$donor->id, $editedDonor);

        $this->assertApiResponse($editedDonor);
    }

    /**
     * @test
     */
    public function testDeleteDonor()
    {
        $donor = $this->makeDonor();
        $this->json('DELETE', '/api/v1/donors/'.$donor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/donors/'.$donor->id);

        $this->assertResponseStatus(404);
    }
}
