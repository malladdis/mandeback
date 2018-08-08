<?php

use App\Models\Output;
use App\Repositories\OutputRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OutputRepositoryTest extends TestCase
{
    use MakeOutputTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OutputRepository
     */
    protected $outputRepo;

    public function setUp()
    {
        parent::setUp();
        $this->outputRepo = App::make(OutputRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOutput()
    {
        $output = $this->fakeOutputData();
        $createdOutput = $this->outputRepo->create($output);
        $createdOutput = $createdOutput->toArray();
        $this->assertArrayHasKey('id', $createdOutput);
        $this->assertNotNull($createdOutput['id'], 'Created Output must have id specified');
        $this->assertNotNull(Output::find($createdOutput['id']), 'Output with given id must be in DB');
        $this->assertModelData($output, $createdOutput);
    }

    /**
     * @test read
     */
    public function testReadOutput()
    {
        $output = $this->makeOutput();
        $dbOutput = $this->outputRepo->find($output->id);
        $dbOutput = $dbOutput->toArray();
        $this->assertModelData($output->toArray(), $dbOutput);
    }

    /**
     * @test update
     */
    public function testUpdateOutput()
    {
        $output = $this->makeOutput();
        $fakeOutput = $this->fakeOutputData();
        $updatedOutput = $this->outputRepo->update($fakeOutput, $output->id);
        $this->assertModelData($fakeOutput, $updatedOutput->toArray());
        $dbOutput = $this->outputRepo->find($output->id);
        $this->assertModelData($fakeOutput, $dbOutput->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOutput()
    {
        $output = $this->makeOutput();
        $resp = $this->outputRepo->delete($output->id);
        $this->assertTrue($resp);
        $this->assertNull(Output::find($output->id), 'Output should not exist in DB');
    }
}
