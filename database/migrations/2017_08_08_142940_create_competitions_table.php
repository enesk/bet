<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->integer('league_id');
            $table->integer('category_id');
            $table->string('home_team');
            $table->string('away_team');
            $table->string('start_time');
            $table->float('rate');
            $table->integer('trust');
            $table->integer('advice_id');
            $table->integer('played');
            $table->integer('won');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            //
        });
    }
}
