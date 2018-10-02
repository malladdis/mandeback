<?php

use Faker\Factory as Faker;
use App\Models\MilestoneActualValue;
use App\Repositories\MilestoneActualValueRepository;

trait MakeMilestoneActualValueTrait
{
    /**
     * Create fake instance of MilestoneActualValue and save it in database
     *
     * @param array $milestoneActualValueFields
     * @return MilestoneActualValue
     */
    public function makeMilestoneActualValue($milestoneActualValueFields = [])
    {
        /** @var MilestoneActualValueRepository $milestoneActualValueRepo */
        $milestoneActualValueRepo = App::make(MilestoneActualValueRepository::class);
        $theme = $this->fakeMilestoneActualValueData($milestoneActualValueFields);
        return $milestoneActualValueRepo->create($theme);
    }

    /**
     * Get fake instance of MilestoneActualValue
     *
     * @param array $milestoneActualValueFields
     * @return MilestoneActualValue
     */
    public function fakeMilestoneActualValue($milestoneActualValueFields = [])
    {
        return new MilestoneActualValue($this->fakeMilestoneActualValueData($milestoneActualValueFields));
    }

    /**
     * Get fake data of MilestoneActualValue
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMilestoneActualValueData($milestoneActualValueFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'milestone_id' => $fake->randomDigitNotNull,
            'value' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $milestoneActualValueFields);
    }
}
