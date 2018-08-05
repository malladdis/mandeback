<?php

use Faker\Factory as Faker;
use App\Models\Program;
use App\Repositories\ProgramRepository;

trait MakeProgramTrait
{
    /**
     * Create fake instance of Program and save it in database
     *
     * @param array $programFields
     * @return Program
     */
    public function makeProgram($programFields = [])
    {
        /** @var ProgramRepository $programRepo */
        $programRepo = App::make(ProgramRepository::class);
        $theme = $this->fakeProgramData($programFields);
        return $programRepo->create($theme);
    }

    /**
     * Get fake instance of Program
     *
     * @param array $programFields
     * @return Program
     */
    public function fakeProgram($programFields = [])
    {
        return new Program($this->fakeProgramData($programFields));
    }

    /**
     * Get fake data of Program
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProgramData($programFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'program_category_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $programFields);
    }
}
