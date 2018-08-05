<?php

use Faker\Factory as Faker;
use App\Models\ProgramDetail;
use App\Repositories\ProgramDetailRepository;

trait MakeProgramDetailTrait
{
    /**
     * Create fake instance of ProgramDetail and save it in database
     *
     * @param array $programDetailFields
     * @return ProgramDetail
     */
    public function makeProgramDetail($programDetailFields = [])
    {
        /** @var ProgramDetailRepository $programDetailRepo */
        $programDetailRepo = App::make(ProgramDetailRepository::class);
        $theme = $this->fakeProgramDetailData($programDetailFields);
        return $programDetailRepo->create($theme);
    }

    /**
     * Get fake instance of ProgramDetail
     *
     * @param array $programDetailFields
     * @return ProgramDetail
     */
    public function fakeProgramDetail($programDetailFields = [])
    {
        return new ProgramDetail($this->fakeProgramDetailData($programDetailFields));
    }

    /**
     * Get fake data of ProgramDetail
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProgramDetailData($programDetailFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'counrty' => $fake->word,
            'budget' => $fake->randomDigitNotNull,
            'starting_date' => $fake->word,
            'ending_date' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $programDetailFields);
    }
}
