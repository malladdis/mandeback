<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndicatorFormApiTest extends TestCase
{
    use MakeIndicatorFormTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIndicatorForm()
    {
        $indicatorForm = $this->fakeIndicatorFormData();
        $this->json('POST', '/api/v1/indicatorForms', $indicatorForm);

        $this->assertApiResponse($indicatorForm);
    }

    /**
     * @test
     */
    public function testReadIndicatorForm()
    {
        $indicatorForm = $this->makeIndicatorForm();
        $this->json('GET', '/api/v1/indicatorForms/'.$indicatorForm->id);

        $this->assertApiResponse($indicatorForm->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIndicatorForm()
    {
        $indicatorForm = $this->makeIndicatorForm();
        $editedIndicatorForm = $this->fakeIndicatorFormData();

        $this->json('PUT', '/api/v1/indicatorForms/'.$indicatorForm->id, $editedIndicatorForm);

        $this->assertApiResponse($editedIndicatorForm);
    }

    /**
     * @test
     */
    public function testDeleteIndicatorForm()
    {
        $indicatorForm = $this->makeIndicatorForm();
        $this->json('DELETE', '/api/v1/indicatorForms/'.$indicatorForm->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/indicatorForms/'.$indicatorForm->id);

        $this->assertResponseStatus(404);
    }
}
