<?php

use Faker\Factory as Faker;
use App\Models\MonthlyExpenditure;
use App\Repositories\MonthlyExpenditureRepository;

trait MakeMonthlyExpenditureTrait
{
    /**
     * Create fake instance of MonthlyExpenditure and save it in database
     *
     * @param array $monthlyExpenditureFields
     * @return MonthlyExpenditure
     */
    public function makeMonthlyExpenditure($monthlyExpenditureFields = [])
    {
        /** @var MonthlyExpenditureRepository $monthlyExpenditureRepo */
        $monthlyExpenditureRepo = App::make(MonthlyExpenditureRepository::class);
        $theme = $this->fakeMonthlyExpenditureData($monthlyExpenditureFields);
        return $monthlyExpenditureRepo->create($theme);
    }

    /**
     * Get fake instance of MonthlyExpenditure
     *
     * @param array $monthlyExpenditureFields
     * @return MonthlyExpenditure
     */
    public function fakeMonthlyExpenditure($monthlyExpenditureFields = [])
    {
        return new MonthlyExpenditure($this->fakeMonthlyExpenditureData($monthlyExpenditureFields));
    }

    /**
     * Get fake data of MonthlyExpenditure
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMonthlyExpenditureData($monthlyExpenditureFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'finance_plan_id' => $fake->randomDigitNotNull,
            'expenditure_id' => $fake->randomDigitNotNull,
            'starting_month' => $fake->word,
            'values' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $monthlyExpenditureFields);
    }
}
