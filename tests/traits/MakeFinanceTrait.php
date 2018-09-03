<?php

use Faker\Factory as Faker;
use App\Models\Finance;
use App\Repositories\FinanceRepository;

trait MakeFinanceTrait
{
    /**
     * Create fake instance of Finance and save it in database
     *
     * @param array $financeFields
     * @return Finance
     */
    public function makeFinance($financeFields = [])
    {
        /** @var FinanceRepository $financeRepo */
        $financeRepo = App::make(FinanceRepository::class);
        $theme = $this->fakeFinanceData($financeFields);
        return $financeRepo->create($theme);
    }

    /**
     * Get fake instance of Finance
     *
     * @param array $financeFields
     * @return Finance
     */
    public function fakeFinance($financeFields = [])
    {
        return new Finance($this->fakeFinanceData($financeFields));
    }

    /**
     * Get fake data of Finance
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFinanceData($financeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'frequency_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $financeFields);
    }
}
