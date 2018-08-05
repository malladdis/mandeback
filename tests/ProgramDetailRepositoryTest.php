<?php

use App\Models\ProgramDetail;
use App\Repositories\ProgramDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramDetailRepositoryTest extends TestCase
{
    use MakeProgramDetailTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProgramDetailRepository
     */
    protected $programDetailRepo;

    public function setUp()
    {
        parent::setUp();
        $this->programDetailRepo = App::make(ProgramDetailRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProgramDetail()
    {
        $programDetail = $this->fakeProgramDetailData();
        $createdProgramDetail = $this->programDetailRepo->create($programDetail);
        $createdProgramDetail = $createdProgramDetail->toArray();
        $this->assertArrayHasKey('id', $createdProgramDetail);
        $this->assertNotNull($createdProgramDetail['id'], 'Created ProgramDetail must have id specified');
        $this->assertNotNull(ProgramDetail::find($createdProgramDetail['id']), 'ProgramDetail with given id must be in DB');
        $this->assertModelData($programDetail, $createdProgramDetail);
    }

    /**
     * @test read
     */
    public function testReadProgramDetail()
    {
        $programDetail = $this->makeProgramDetail();
        $dbProgramDetail = $this->programDetailRepo->find($programDetail->id);
        $dbProgramDetail = $dbProgramDetail->toArray();
        $this->assertModelData($programDetail->toArray(), $dbProgramDetail);
    }

    /**
     * @test update
     */
    public function testUpdateProgramDetail()
    {
        $programDetail = $this->makeProgramDetail();
        $fakeProgramDetail = $this->fakeProgramDetailData();
        $updatedProgramDetail = $this->programDetailRepo->update($fakeProgramDetail, $programDetail->id);
        $this->assertModelData($fakeProgramDetail, $updatedProgramDetail->toArray());
        $dbProgramDetail = $this->programDetailRepo->find($programDetail->id);
        $this->assertModelData($fakeProgramDetail, $dbProgramDetail->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProgramDetail()
    {
        $programDetail = $this->makeProgramDetail();
        $resp = $this->programDetailRepo->delete($programDetail->id);
        $this->assertTrue($resp);
        $this->assertNull(ProgramDetail::find($programDetail->id), 'ProgramDetail should not exist in DB');
    }
}
