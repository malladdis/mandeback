<?php

use Faker\Factory as Faker;
use App\Models\Expenditure;
use App\Repositories\ExpenditureRepository;

trait MakeExpenditureTrait
{
    /**
     * Create fake instance of Expenditure and save it in database
     *
     * @param array $expenditureFields
     * @return Expenditure
     */
    public function makeExpenditure($expenditureFields = [])
    {
        /** @var ExpenditureRepository $expenditureRepo */
        $expenditureRepo = App::make(ExpenditureRepository::class);
        $theme = $this->fakeExpenditureData($expenditureFields);
        return $expenditureRepo->create($theme);
    }

    /**
     * Get fake instance of Expenditure
     *
     * @param array $expenditureFields
     * @return Expenditure
     */
    public function fakeExpenditure($expenditureFields = [])
    {
        return new Expenditure($this->fakeExpenditureData($expenditureFields));
    }

    /**
     * Get fake data of Expenditure
     *
     * @param array $postFields
     * @return array
     */
    public function fakeExpenditureData($expenditureFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'expenditure_category_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'amount' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $expenditureFields);
    }
}
