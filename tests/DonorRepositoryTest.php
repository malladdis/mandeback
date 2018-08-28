<?php

use App\Models\Donor;
use App\Repositories\DonorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DonorRepositoryTest extends TestCase
{
    use MakeDonorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DonorRepository
     */
    protected $donorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->donorRepo = App::make(DonorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDonor()
    {
        $donor = $this->fakeDonorData();
        $createdDonor = $this->donorRepo->create($donor);
        $createdDonor = $createdDonor->toArray();
        $this->assertArrayHasKey('id', $createdDonor);
        $this->assertNotNull($createdDonor['id'], 'Created Donor must have id specified');
        $this->assertNotNull(Donor::find($createdDonor['id']), 'Donor with given id must be in DB');
        $this->assertModelData($donor, $createdDonor);
    }

    /**
     * @test read
     */
    public function testReadDonor()
    {
        $donor = $this->makeDonor();
        $dbDonor = $this->donorRepo->find($donor->id);
        $dbDonor = $dbDonor->toArray();
        $this->assertModelData($donor->toArray(), $dbDonor);
    }

    /**
     * @test update
     */
    public function testUpdateDonor()
    {
        $donor = $this->makeDonor();
        $fakeDonor = $this->fakeDonorData();
        $updatedDonor = $this->donorRepo->update($fakeDonor, $donor->id);
        $this->assertModelData($fakeDonor, $updatedDonor->toArray());
        $dbDonor = $this->donorRepo->find($donor->id);
        $this->assertModelData($fakeDonor, $dbDonor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDonor()
    {
        $donor = $this->makeDonor();
        $resp = $this->donorRepo->delete($donor->id);
        $this->assertTrue($resp);
        $this->assertNull(Donor::find($donor->id), 'Donor should not exist in DB');
    }
}
