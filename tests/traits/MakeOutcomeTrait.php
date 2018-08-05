<?php

use Faker\Factory as Faker;
use App\Models\Outcome;
use App\Repositories\OutcomeRepository;

trait MakeOutcomeTrait
{
    /**
     * Create fake instance of Outcome and save it in database
     *
     * @param array $outcomeFields
     * @return Outcome
     */
    public function makeOutcome($outcomeFields = [])
    {
        /** @var OutcomeRepository $outcomeRepo */
        $outcomeRepo = App::make(OutcomeRepository::class);
        $theme = $this->fakeOutcomeData($outcomeFields);
        return $outcomeRepo->create($theme);
    }

    /**
     * Get fake instance of Outcome
     *
     * @param array $outcomeFields
     * @return Outcome
     */
    public function fakeOutcome($outcomeFields = [])
    {
        return new Outcome($this->fakeOutcomeData($outcomeFields));
    }

    /**
     * Get fake data of Outcome
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOutcomeData($outcomeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'description' => $fake->text,
            'parent_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $outcomeFields);
    }
}
