<?php

use Faker\Factory as Faker;
use App\Models\ExpenditureCategory;
use App\Repositories\ExpenditureCategoryRepository;

trait MakeExpenditureCategoryTrait
{
    /**
     * Create fake instance of ExpenditureCategory and save it in database
     *
     * @param array $expenditureCategoryFields
     * @return ExpenditureCategory
     */
    public function makeExpenditureCategory($expenditureCategoryFields = [])
    {
        /** @var ExpenditureCategoryRepository $expenditureCategoryRepo */
        $expenditureCategoryRepo = App::make(ExpenditureCategoryRepository::class);
        $theme = $this->fakeExpenditureCategoryData($expenditureCategoryFields);
        return $expenditureCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ExpenditureCategory
     *
     * @param array $expenditureCategoryFields
     * @return ExpenditureCategory
     */
    public function fakeExpenditureCategory($expenditureCategoryFields = [])
    {
        return new ExpenditureCategory($this->fakeExpenditureCategoryData($expenditureCategoryFields));
    }

    /**
     * Get fake data of ExpenditureCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeExpenditureCategoryData($expenditureCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $expenditureCategoryFields);
    }
}
