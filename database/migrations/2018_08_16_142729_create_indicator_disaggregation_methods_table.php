<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndicatorDisaggregationMethodsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_disaggregation_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indicator_id');
            $table->integer('disaggregation_method_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('indicator_disaggregation_methods');
    }
}
