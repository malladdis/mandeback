<?php

use Faker\Factory as Faker;
use App\Models\ProjectFrequency;
use App\Repositories\ProjectFrequencyRepository;

trait MakeProjectFrequencyTrait
{
    /**
     * Create fake instance of ProjectFrequency and save it in database
     *
     * @param array $projectFrequencyFields
     * @return ProjectFrequency
     */
    public function makeProjectFrequency($projectFrequencyFields = [])
    {
        /** @var ProjectFrequencyRepository $projectFrequencyRepo */
        $projectFrequencyRepo = App::make(ProjectFrequencyRepository::class);
        $theme = $this->fakeProjectFrequencyData($projectFrequencyFields);
        return $projectFrequencyRepo->create($theme);
    }

    /**
     * Get fake instance of ProjectFrequency
     *
     * @param array $projectFrequencyFields
     * @return ProjectFrequency
     */
    public function fakeProjectFrequency($projectFrequencyFields = [])
    {
        return new ProjectFrequency($this->fakeProjectFrequencyData($projectFrequencyFields));
    }

    /**
     * Get fake data of ProjectFrequency
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProjectFrequencyData($projectFrequencyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'frequency_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $projectFrequencyFields);
    }
}
