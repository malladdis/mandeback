<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndicatorFormsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indicator_id');
            $table->integer('form_id');
            $table->integer('calculation_method_id');
            $table->string('disaggregation');
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
        Schema::drop('indicator_forms');
    }
}
