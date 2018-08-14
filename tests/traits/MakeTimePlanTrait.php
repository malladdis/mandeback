<?php

use Faker\Factory as Faker;
use App\Models\TimePlan;
use App\Repositories\TimePlanRepository;

trait MakeTimePlanTrait
{
    /**
     * Create fake instance of TimePlan and save it in database
     *
     * @param array $timePlanFields
     * @return TimePlan
     */
    public function makeTimePlan($timePlanFields = [])
    {
        /** @var TimePlanRepository $timePlanRepo */
        $timePlanRepo = App::make(TimePlanRepository::class);
        $theme = $this->fakeTimePlanData($timePlanFields);
        return $timePlanRepo->create($theme);
    }

    /**
     * Get fake instance of TimePlan
     *
     * @param array $timePlanFields
     * @return TimePlan
     */
    public function fakeTimePlan($timePlanFields = [])
    {
        return new TimePlan($this->fakeTimePlanData($timePlanFields));
    }

    /**
     * Get fake data of TimePlan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTimePlanData($timePlanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $timePlanFields);
    }
}
