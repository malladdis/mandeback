<?php

use Faker\Factory as Faker;
use App\Models\Budget;
use App\Repositories\BudgetRepository;

trait MakeBudgetTrait
{
    /**
     * Create fake instance of Budget and save it in database
     *
     * @param array $budgetFields
     * @return Budget
     */
    public function makeBudget($budgetFields = [])
    {
        /** @var BudgetRepository $budgetRepo */
        $budgetRepo = App::make(BudgetRepository::class);
        $theme = $this->fakeBudgetData($budgetFields);
        return $budgetRepo->create($theme);
    }

    /**
     * Get fake instance of Budget
     *
     * @param array $budgetFields
     * @return Budget
     */
    public function fakeBudget($budgetFields = [])
    {
        return new Budget($this->fakeBudgetData($budgetFields));
    }

    /**
     * Get fake data of Budget
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBudgetData($budgetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'amount' => $fake->word,
            'currency_id' => $fake->randomDigitNotNull,
            'donor_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $budgetFields);
    }
}
