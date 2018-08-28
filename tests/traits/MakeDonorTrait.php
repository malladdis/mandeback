<?php

use Faker\Factory as Faker;
use App\Models\Donor;
use App\Repositories\DonorRepository;

trait MakeDonorTrait
{
    /**
     * Create fake instance of Donor and save it in database
     *
     * @param array $donorFields
     * @return Donor
     */
    public function makeDonor($donorFields = [])
    {
        /** @var DonorRepository $donorRepo */
        $donorRepo = App::make(DonorRepository::class);
        $theme = $this->fakeDonorData($donorFields);
        return $donorRepo->create($theme);
    }

    /**
     * Get fake instance of Donor
     *
     * @param array $donorFields
     * @return Donor
     */
    public function fakeDonor($donorFields = [])
    {
        return new Donor($this->fakeDonorData($donorFields));
    }

    /**
     * Get fake data of Donor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDonorData($donorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'badget_amount' => $fake->word,
            'status' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $donorFields);
    }
}
