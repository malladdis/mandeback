<?php

use Faker\Factory as Faker;
use App\Models\FinancePlan;
use App\Repositories\FinancePlanRepository;

trait MakeFinancePlanTrait
{
    /**
     * Create fake instance of FinancePlan and save it in database
     *
     * @param array $financePlanFields
     * @return FinancePlan
     */
    public function makeFinancePlan($financePlanFields = [])
    {
        /** @var FinancePlanRepository $financePlanRepo */
        $financePlanRepo = App::make(FinancePlanRepository::class);
        $theme = $this->fakeFinancePlanData($financePlanFields);
        return $financePlanRepo->create($theme);
    }

    /**
     * Get fake instance of FinancePlan
     *
     * @param array $financePlanFields
     * @return FinancePlan
     */
    public function fakeFinancePlan($financePlanFields = [])
    {
        return new FinancePlan($this->fakeFinancePlanData($financePlanFields));
    }

    /**
     * Get fake data of FinancePlan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFinancePlanData($financePlanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'frequency_id' => $fake->randomDigitNotNull,
            'values' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $financePlanFields);
    }
}
