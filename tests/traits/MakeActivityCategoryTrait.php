<?php

use Faker\Factory as Faker;
use App\Models\ActivityCategory;
use App\Repositories\ActivityCategoryRepository;

trait MakeActivityCategoryTrait
{
    /**
     * Create fake instance of ActivityCategory and save it in database
     *
     * @param array $activityCategoryFields
     * @return ActivityCategory
     */
    public function makeActivityCategory($activityCategoryFields = [])
    {
        /** @var ActivityCategoryRepository $activityCategoryRepo */
        $activityCategoryRepo = App::make(ActivityCategoryRepository::class);
        $theme = $this->fakeActivityCategoryData($activityCategoryFields);
        return $activityCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ActivityCategory
     *
     * @param array $activityCategoryFields
     * @return ActivityCategory
     */
    public function fakeActivityCategory($activityCategoryFields = [])
    {
        return new ActivityCategory($this->fakeActivityCategoryData($activityCategoryFields));
    }

    /**
     * Get fake data of ActivityCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActivityCategoryData($activityCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $activityCategoryFields);
    }
}
