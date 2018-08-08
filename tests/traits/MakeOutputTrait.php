<?php

use Faker\Factory as Faker;
use App\Models\Output;
use App\Repositories\OutputRepository;

trait MakeOutputTrait
{
    /**
     * Create fake instance of Output and save it in database
     *
     * @param array $outputFields
     * @return Output
     */
    public function makeOutput($outputFields = [])
    {
        /** @var OutputRepository $outputRepo */
        $outputRepo = App::make(OutputRepository::class);
        $theme = $this->fakeOutputData($outputFields);
        return $outputRepo->create($theme);
    }

    /**
     * Get fake instance of Output
     *
     * @param array $outputFields
     * @return Output
     */
    public function fakeOutput($outputFields = [])
    {
        return new Output($this->fakeOutputData($outputFields));
    }

    /**
     * Get fake data of Output
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOutputData($outputFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'outcome_id' => $fake->randomDigitNotNull,
            'parent_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $outputFields);
    }
}
