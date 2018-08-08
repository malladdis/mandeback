<?php

use Faker\Factory as Faker;
use App\Models\OutcomeIndicator;
use App\Repositories\OutcomeIndicatorRepository;

trait MakeOutcomeIndicatorTrait
{
    /**
     * Create fake instance of OutcomeIndicator and save it in database
     *
     * @param array $outcomeIndicatorFields
     * @return OutcomeIndicator
     */
    public function makeOutcomeIndicator($outcomeIndicatorFields = [])
    {
        /** @var OutcomeIndicatorRepository $outcomeIndicatorRepo */
        $outcomeIndicatorRepo = App::make(OutcomeIndicatorRepository::class);
        $theme = $this->fakeOutcomeIndicatorData($outcomeIndicatorFields);
        return $outcomeIndicatorRepo->create($theme);
    }

    /**
     * Get fake instance of OutcomeIndicator
     *
     * @param array $outcomeIndicatorFields
     * @return OutcomeIndicator
     */
    public function fakeOutcomeIndicator($outcomeIndicatorFields = [])
    {
        return new OutcomeIndicator($this->fakeOutcomeIndicatorData($outcomeIndicatorFields));
    }

    /**
     * Get fake data of OutcomeIndicator
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOutcomeIndicatorData($outcomeIndicatorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'outcome_id' => $fake->randomDigitNotNull,
            'indicator_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $outcomeIndicatorFields);
    }
}
