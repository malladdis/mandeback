<?php

use Faker\Factory as Faker;
use App\Models\ProgramCategory;
use App\Repositories\ProgramCategoryRepository;

trait MakeProgramCategoryTrait
{
    /**
     * Create fake instance of ProgramCategory and save it in database
     *
     * @param array $programCategoryFields
     * @return ProgramCategory
     */
    public function makeProgramCategory($programCategoryFields = [])
    {
        /** @var ProgramCategoryRepository $programCategoryRepo */
        $programCategoryRepo = App::make(ProgramCategoryRepository::class);
        $theme = $this->fakeProgramCategoryData($programCategoryFields);
        return $programCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ProgramCategory
     *
     * @param array $programCategoryFields
     * @return ProgramCategory
     */
    public function fakeProgramCategory($programCategoryFields = [])
    {
        return new ProgramCategory($this->fakeProgramCategoryData($programCategoryFields));
    }

    /**
     * Get fake data of ProgramCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProgramCategoryData($programCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $programCategoryFields);
    }
}
