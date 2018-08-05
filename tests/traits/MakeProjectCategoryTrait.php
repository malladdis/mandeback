<?php

use Faker\Factory as Faker;
use App\Models\ProjectCategory;
use App\Repositories\ProjectCategoryRepository;

trait MakeProjectCategoryTrait
{
    /**
     * Create fake instance of ProjectCategory and save it in database
     *
     * @param array $projectCategoryFields
     * @return ProjectCategory
     */
    public function makeProjectCategory($projectCategoryFields = [])
    {
        /** @var ProjectCategoryRepository $projectCategoryRepo */
        $projectCategoryRepo = App::make(ProjectCategoryRepository::class);
        $theme = $this->fakeProjectCategoryData($projectCategoryFields);
        return $projectCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ProjectCategory
     *
     * @param array $projectCategoryFields
     * @return ProjectCategory
     */
    public function fakeProjectCategory($projectCategoryFields = [])
    {
        return new ProjectCategory($this->fakeProjectCategoryData($projectCategoryFields));
    }

    /**
     * Get fake data of ProjectCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProjectCategoryData($projectCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $projectCategoryFields);
    }
}
