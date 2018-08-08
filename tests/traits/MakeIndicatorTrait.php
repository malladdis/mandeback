<?php

use Faker\Factory as Faker;
use App\Models\Indicator;
use App\Repositories\IndicatorRepository;

trait MakeIndicatorTrait
{
    /**
     * Create fake instance of Indicator and save it in database
     *
     * @param array $indicatorFields
     * @return Indicator
     */
    public function makeIndicator($indicatorFields = [])
    {
        /** @var IndicatorRepository $indicatorRepo */
        $indicatorRepo = App::make(IndicatorRepository::class);
        $theme = $this->fakeIndicatorData($indicatorFields);
        return $indicatorRepo->create($theme);
    }

    /**
     * Get fake instance of Indicator
     *
     * @param array $indicatorFields
     * @return Indicator
     */
    public function fakeIndicator($indicatorFields = [])
    {
        return new Indicator($this->fakeIndicatorData($indicatorFields));
    }

    /**
     * Get fake data of Indicator
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIndicatorData($indicatorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $indicatorFields);
    }
}
