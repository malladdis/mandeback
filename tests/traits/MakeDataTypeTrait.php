<?php

use Faker\Factory as Faker;
use App\Models\DataType;
use App\Repositories\DataTypeRepository;

trait MakeDataTypeTrait
{
    /**
     * Create fake instance of DataType and save it in database
     *
     * @param array $dataTypeFields
     * @return DataType
     */
    public function makeDataType($dataTypeFields = [])
    {
        /** @var DataTypeRepository $dataTypeRepo */
        $dataTypeRepo = App::make(DataTypeRepository::class);
        $theme = $this->fakeDataTypeData($dataTypeFields);
        return $dataTypeRepo->create($theme);
    }

    /**
     * Get fake instance of DataType
     *
     * @param array $dataTypeFields
     * @return DataType
     */
    public function fakeDataType($dataTypeFields = [])
    {
        return new DataType($this->fakeDataTypeData($dataTypeFields));
    }

    /**
     * Get fake data of DataType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDataTypeData($dataTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $dataTypeFields);
    }
}
