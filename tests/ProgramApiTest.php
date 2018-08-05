<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramApiTest extends TestCase
{
    use MakeProgramTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProgram()
    {
        $program = $this->fakeProgramData();
        $this->json('POST', '/api/v1/programs', $program);

        $this->assertApiResponse($program);
    }

    /**
     * @test
     */
    public function testReadProgram()
    {
        $program = $this->makeProgram();
        $this->json('GET', '/api/v1/programs/'.$program->id);

        $this->assertApiResponse($program->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProgram()
    {
        $program = $this->makeProgram();
        $editedProgram = $this->fakeProgramData();

        $this->json('PUT', '/api/v1/programs/'.$program->id, $editedProgram);

        $this->assertApiResponse($editedProgram);
    }

    /**
     * @test
     */
    public function testDeleteProgram()
    {
        $program = $this->makeProgram();
        $this->json('DELETE', '/api/v1/programs/'.$program->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/programs/'.$program->id);

        $this->assertResponseStatus(404);
    }
}
