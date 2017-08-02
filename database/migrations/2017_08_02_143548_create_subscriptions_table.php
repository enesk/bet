<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->timestamps();
        });
        Schema::create('subscriptions_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('subscription_id');
            $table->timestamps();
            $table->string('ends_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            //
        });
        Schema::table('subscriptions_users', function (Blueprint $table) {
            //
        });
    }
}
