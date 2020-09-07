<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_logo');
            $table->string('dashboard_logo');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('instagram_link');
            $table->string('public_key');
            $table->string('tx_ref');
            $table->string('amount');
            $table->string('FACEBOOK_CLINET_ID');
            $table->string('FACEBOOK_CLINET_SECRET');
            $table->string('GMAIL_CLINET_ID');
            $table->string('GMAIL_CLINET_SECRET');
            $table->string('TWITTER_CLINET_ID');
            $table->string('TWITTER_CLINET_SECRET');
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
        Schema::dropIfExists('settings');
    }
}
