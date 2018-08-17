<?php

use Faker\Factory as Faker;
use App\Models\ActivityIndicator;
use App\Repositories\ActivityIndicatorRepository;

trait MakeActivityIndicatorTrait
{
    /**
     * Create fake instance of ActivityIndicator and save it in database
     *
     * @param array $activityIndicatorFields
     * @return ActivityIndicator
     */
    public function makeActivityIndicator($activityIndicatorFields = [])
    {
        /** @var ActivityIndicatorRepository $activityIndicatorRepo */
        $activityIndicatorRepo = App::make(ActivityIndicatorRepository::class);
        $theme = $this->fakeActivityIndicatorData($activityIndicatorFields);
        return $activityIndicatorRepo->create($theme);
    }

    /**
     * Get fake instance of ActivityIndicator
     *
     * @param array $activityIndicatorFields
     * @return ActivityIndicator
     */
    public function fakeActivityIndicator($activityIndicatorFields = [])
    {
        return new ActivityIndicator($this->fakeActivityIndicatorData($activityIndicatorFields));
    }

    /**
     * Get fake data of ActivityIndicator
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActivityIndicatorData($activityIndicatorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'activity_id' => $fake->randomDigitNotNull,
            'indicator_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $activityIndicatorFields);
    }
}
