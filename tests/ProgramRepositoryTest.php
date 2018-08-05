<?php

use App\Models\Program;
use App\Repositories\ProgramRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramRepositoryTest extends TestCase
{
    use MakeProgramTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProgramRepository
     */
    protected $programRepo;

    public function setUp()
    {
        parent::setUp();
        $this->programRepo = App::make(ProgramRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProgram()
    {
        $program = $this->fakeProgramData();
        $createdProgram = $this->programRepo->create($program);
        $createdProgram = $createdProgram->toArray();
        $this->assertArrayHasKey('id', $createdProgram);
        $this->assertNotNull($createdProgram['id'], 'Created Program must have id specified');
        $this->assertNotNull(Program::find($createdProgram['id']), 'Program with given id must be in DB');
        $this->assertModelData($program, $createdProgram);
    }

    /**
     * @test read
     */
    public function testReadProgram()
    {
        $program = $this->makeProgram();
        $dbProgram = $this->programRepo->find($program->id);
        $dbProgram = $dbProgram->toArray();
        $this->assertModelData($program->toArray(), $dbProgram);
    }

    /**
     * @test update
     */
    public function testUpdateProgram()
    {
        $program = $this->makeProgram();
        $fakeProgram = $this->fakeProgramData();
        $updatedProgram = $this->programRepo->update($fakeProgram, $program->id);
        $this->assertModelData($fakeProgram, $updatedProgram->toArray());
        $dbProgram = $this->programRepo->find($program->id);
        $this->assertModelData($fakeProgram, $dbProgram->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProgram()
    {
        $program = $this->makeProgram();
        $resp = $this->programRepo->delete($program->id);
        $this->assertTrue($resp);
        $this->assertNull(Program::find($program->id), 'Program should not exist in DB');
    }
}
