<?php

use Faker\Factory as Faker;
use App\Models\ActivityBudget;
use App\Repositories\ActivityBudgetRepository;

trait MakeActivityBudgetTrait
{
    /**
     * Create fake instance of ActivityBudget and save it in database
     *
     * @param array $activityBudgetFields
     * @return ActivityBudget
     */
    public function makeActivityBudget($activityBudgetFields = [])
    {
        /** @var ActivityBudgetRepository $activityBudgetRepo */
        $activityBudgetRepo = App::make(ActivityBudgetRepository::class);
        $theme = $this->fakeActivityBudgetData($activityBudgetFields);
        return $activityBudgetRepo->create($theme);
    }

    /**
     * Get fake instance of ActivityBudget
     *
     * @param array $activityBudgetFields
     * @return ActivityBudget
     */
    public function fakeActivityBudget($activityBudgetFields = [])
    {
        return new ActivityBudget($this->fakeActivityBudgetData($activityBudgetFields));
    }

    /**
     * Get fake data of ActivityBudget
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActivityBudgetData($activityBudgetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'activity_id' => $fake->randomDigitNotNull,
            'amount' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $activityBudgetFields);
    }
}
