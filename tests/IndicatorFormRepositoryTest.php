<?php

use App\Models\IndicatorForm;
use App\Repositories\IndicatorFormRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndicatorFormRepositoryTest extends TestCase
{
    use MakeIndicatorFormTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IndicatorFormRepository
     */
    protected $indicatorFormRepo;

    public function setUp()
    {
        parent::setUp();
        $this->indicatorFormRepo = App::make(IndicatorFormRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIndicatorForm()
    {
        $indicatorForm = $this->fakeIndicatorFormData();
        $createdIndicatorForm = $this->indicatorFormRepo->create($indicatorForm);
        $createdIndicatorForm = $createdIndicatorForm->toArray();
        $this->assertArrayHasKey('id', $createdIndicatorForm);
        $this->assertNotNull($createdIndicatorForm['id'], 'Created IndicatorForm must have id specified');
        $this->assertNotNull(IndicatorForm::find($createdIndicatorForm['id']), 'IndicatorForm with given id must be in DB');
        $this->assertModelData($indicatorForm, $createdIndicatorForm);
    }

    /**
     * @test read
     */
    public function testReadIndicatorForm()
    {
        $indicatorForm = $this->makeIndicatorForm();
        $dbIndicatorForm = $this->indicatorFormRepo->find($indicatorForm->id);
        $dbIndicatorForm = $dbIndicatorForm->toArray();
        $this->assertModelData($indicatorForm->toArray(), $dbIndicatorForm);
    }

    /**
     * @test update
     */
    public function testUpdateIndicatorForm()
    {
        $indicatorForm = $this->makeIndicatorForm();
        $fakeIndicatorForm = $this->fakeIndicatorFormData();
        $updatedIndicatorForm = $this->indicatorFormRepo->update($fakeIndicatorForm, $indicatorForm->id);
        $this->assertModelData($fakeIndicatorForm, $updatedIndicatorForm->toArray());
        $dbIndicatorForm = $this->indicatorFormRepo->find($indicatorForm->id);
        $this->assertModelData($fakeIndicatorForm, $dbIndicatorForm->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIndicatorForm()
    {
        $indicatorForm = $this->makeIndicatorForm();
        $resp = $this->indicatorFormRepo->delete($indicatorForm->id);
        $this->assertTrue($resp);
        $this->assertNull(IndicatorForm::find($indicatorForm->id), 'IndicatorForm should not exist in DB');
    }
}
