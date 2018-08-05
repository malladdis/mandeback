<?php

use Faker\Factory as Faker;
use App\Models\ProjectBeneficiary;
use App\Repositories\ProjectBeneficiaryRepository;

trait MakeProjectBeneficiaryTrait
{
    /**
     * Create fake instance of ProjectBeneficiary and save it in database
     *
     * @param array $projectBeneficiaryFields
     * @return ProjectBeneficiary
     */
    public function makeProjectBeneficiary($projectBeneficiaryFields = [])
    {
        /** @var ProjectBeneficiaryRepository $projectBeneficiaryRepo */
        $projectBeneficiaryRepo = App::make(ProjectBeneficiaryRepository::class);
        $theme = $this->fakeProjectBeneficiaryData($projectBeneficiaryFields);
        return $projectBeneficiaryRepo->create($theme);
    }

    /**
     * Get fake instance of ProjectBeneficiary
     *
     * @param array $projectBeneficiaryFields
     * @return ProjectBeneficiary
     */
    public function fakeProjectBeneficiary($projectBeneficiaryFields = [])
    {
        return new ProjectBeneficiary($this->fakeProjectBeneficiaryData($projectBeneficiaryFields));
    }

    /**
     * Get fake data of ProjectBeneficiary
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProjectBeneficiaryData($projectBeneficiaryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->word,
            'beneficiary_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $projectBeneficiaryFields);
    }
}
