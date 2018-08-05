<?php

use Faker\Factory as Faker;
use App\Models\ProjectImplementer;
use App\Repositories\ProjectImplementerRepository;

trait MakeProjectImplementerTrait
{
    /**
     * Create fake instance of ProjectImplementer and save it in database
     *
     * @param array $projectImplementerFields
     * @return ProjectImplementer
     */
    public function makeProjectImplementer($projectImplementerFields = [])
    {
        /** @var ProjectImplementerRepository $projectImplementerRepo */
        $projectImplementerRepo = App::make(ProjectImplementerRepository::class);
        $theme = $this->fakeProjectImplementerData($projectImplementerFields);
        return $projectImplementerRepo->create($theme);
    }

    /**
     * Get fake instance of ProjectImplementer
     *
     * @param array $projectImplementerFields
     * @return ProjectImplementer
     */
    public function fakeProjectImplementer($projectImplementerFields = [])
    {
        return new ProjectImplementer($this->fakeProjectImplementerData($projectImplementerFields));
    }

    /**
     * Get fake data of ProjectImplementer
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProjectImplementerData($projectImplementerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'implementer_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $projectImplementerFields);
    }
}
