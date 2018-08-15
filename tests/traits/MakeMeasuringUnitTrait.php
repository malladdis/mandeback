<?php

use Faker\Factory as Faker;
use App\Models\MeasuringUnit;
use App\Repositories\MeasuringUnitRepository;

trait MakeMeasuringUnitTrait
{
    /**
     * Create fake instance of MeasuringUnit and save it in database
     *
     * @param array $measuringUnitFields
     * @return MeasuringUnit
     */
    public function makeMeasuringUnit($measuringUnitFields = [])
    {
        /** @var MeasuringUnitRepository $measuringUnitRepo */
        $measuringUnitRepo = App::make(MeasuringUnitRepository::class);
        $theme = $this->fakeMeasuringUnitData($measuringUnitFields);
        return $measuringUnitRepo->create($theme);
    }

    /**
     * Get fake instance of MeasuringUnit
     *
     * @param array $measuringUnitFields
     * @return MeasuringUnit
     */
    public function fakeMeasuringUnit($measuringUnitFields = [])
    {
        return new MeasuringUnit($this->fakeMeasuringUnitData($measuringUnitFields));
    }

    /**
     * Get fake data of MeasuringUnit
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMeasuringUnitData($measuringUnitFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $measuringUnitFields);
    }
}
