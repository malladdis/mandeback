<?php

use Faker\Factory as Faker;
use App\Models\DisaggregationMethod;
use App\Repositories\DisaggregationMethodRepository;

trait MakeDisaggregationMethodTrait
{
    /**
     * Create fake instance of DisaggregationMethod and save it in database
     *
     * @param array $disaggregationMethodFields
     * @return DisaggregationMethod
     */
    public function makeDisaggregationMethod($disaggregationMethodFields = [])
    {
        /** @var DisaggregationMethodRepository $disaggregationMethodRepo */
        $disaggregationMethodRepo = App::make(DisaggregationMethodRepository::class);
        $theme = $this->fakeDisaggregationMethodData($disaggregationMethodFields);
        return $disaggregationMethodRepo->create($theme);
    }

    /**
     * Get fake instance of DisaggregationMethod
     *
     * @param array $disaggregationMethodFields
     * @return DisaggregationMethod
     */
    public function fakeDisaggregationMethod($disaggregationMethodFields = [])
    {
        return new DisaggregationMethod($this->fakeDisaggregationMethodData($disaggregationMethodFields));
    }

    /**
     * Get fake data of DisaggregationMethod
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDisaggregationMethodData($disaggregationMethodFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $disaggregationMethodFields);
    }
}
