<?php

use Faker\Factory as Faker;
use App\Models\OutputIndicator;
use App\Repositories\OutputIndicatorRepository;

trait MakeOutputIndicatorTrait
{
    /**
     * Create fake instance of OutputIndicator and save it in database
     *
     * @param array $outputIndicatorFields
     * @return OutputIndicator
     */
    public function makeOutputIndicator($outputIndicatorFields = [])
    {
        /** @var OutputIndicatorRepository $outputIndicatorRepo */
        $outputIndicatorRepo = App::make(OutputIndicatorRepository::class);
        $theme = $this->fakeOutputIndicatorData($outputIndicatorFields);
        return $outputIndicatorRepo->create($theme);
    }

    /**
     * Get fake instance of OutputIndicator
     *
     * @param array $outputIndicatorFields
     * @return OutputIndicator
     */
    public function fakeOutputIndicator($outputIndicatorFields = [])
    {
        return new OutputIndicator($this->fakeOutputIndicatorData($outputIndicatorFields));
    }

    /**
     * Get fake data of OutputIndicator
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOutputIndicatorData($outputIndicatorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'output_id' => $fake->randomDigitNotNull,
            'indicator_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $outputIndicatorFields);
    }
}
