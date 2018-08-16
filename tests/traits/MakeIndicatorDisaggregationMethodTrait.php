<?php

use Faker\Factory as Faker;
use App\Models\IndicatorDisaggregationMethod;
use App\Repositories\IndicatorDisaggregationMethodRepository;

trait MakeIndicatorDisaggregationMethodTrait
{
    /**
     * Create fake instance of IndicatorDisaggregationMethod and save it in database
     *
     * @param array $indicatorDisaggregationMethodFields
     * @return IndicatorDisaggregationMethod
     */
    public function makeIndicatorDisaggregationMethod($indicatorDisaggregationMethodFields = [])
    {
        /** @var IndicatorDisaggregationMethodRepository $indicatorDisaggregationMethodRepo */
        $indicatorDisaggregationMethodRepo = App::make(IndicatorDisaggregationMethodRepository::class);
        $theme = $this->fakeIndicatorDisaggregationMethodData($indicatorDisaggregationMethodFields);
        return $indicatorDisaggregationMethodRepo->create($theme);
    }

    /**
     * Get fake instance of IndicatorDisaggregationMethod
     *
     * @param array $indicatorDisaggregationMethodFields
     * @return IndicatorDisaggregationMethod
     */
    public function fakeIndicatorDisaggregationMethod($indicatorDisaggregationMethodFields = [])
    {
        return new IndicatorDisaggregationMethod($this->fakeIndicatorDisaggregationMethodData($indicatorDisaggregationMethodFields));
    }

    /**
     * Get fake data of IndicatorDisaggregationMethod
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIndicatorDisaggregationMethodData($indicatorDisaggregationMethodFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'indicator_id' => $fake->randomDigitNotNull,
            'disggregation_method_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $indicatorDisaggregationMethodFields);
    }
}
