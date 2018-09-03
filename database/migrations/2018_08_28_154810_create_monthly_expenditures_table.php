<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyExpendituresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_expenditures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('finance_plan_id');
            $table->integer('expenditure_id');
            $table->string('starting_month');
            $table->text('values');
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
        Schema::drop('monthly_expenditures');
    }
}
