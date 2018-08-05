<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('cluster_id');
            $table->float('budget');
            $table->text('goal')->nullable();
            $table->text('objective')->nullable();
            $table->integer('mng_1');
            $table->integer('mng_2')->nullable();
            $table->string('starting_date');
            $table->string('ending_date');
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
        Schema::drop('project_details');
    }
}
