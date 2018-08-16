<?php

use Faker\Factory as Faker;
use App\Models\IndicatorForm;
use App\Repositories\IndicatorFormRepository;

trait MakeIndicatorFormTrait
{
    /**
     * Create fake instance of IndicatorForm and save it in database
     *
     * @param array $indicatorFormFields
     * @return IndicatorForm
     */
    public function makeIndicatorForm($indicatorFormFields = [])
    {
        /** @var IndicatorFormRepository $indicatorFormRepo */
        $indicatorFormRepo = App::make(IndicatorFormRepository::class);
        $theme = $this->fakeIndicatorFormData($indicatorFormFields);
        return $indicatorFormRepo->create($theme);
    }

    /**
     * Get fake instance of IndicatorForm
     *
     * @param array $indicatorFormFields
     * @return IndicatorForm
     */
    public function fakeIndicatorForm($indicatorFormFields = [])
    {
        return new IndicatorForm($this->fakeIndicatorFormData($indicatorFormFields));
    }

    /**
     * Get fake data of IndicatorForm
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIndicatorFormData($indicatorFormFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'indicator_id' => $fake->randomDigitNotNull,
            'form_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $indicatorFormFields);
    }
}
