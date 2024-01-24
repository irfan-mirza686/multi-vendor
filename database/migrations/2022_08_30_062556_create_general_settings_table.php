<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename');
            $table->string('email_method')->nullable();
            $table->text('smtp_config')->nullable();
            $table->tinyInteger('user_reg')->nullable();
            $table->tinyInteger('wholesaler_reg')->nullable();
            $table->tinyInteger('vendor_reg')->nullable();
            $table->string('logo',50)->nullable();
            $table->string('icon',50)->nullable();
            $table->string('default_img',50)->nullable();
            $table->string('email_from')->nullable();
            $table->string('api_token')->nullable();
            $table->string('talk_to')->nullable();
            $table->string('twak_allow')->nullable();
            $table->string('twak_key')->nullable();
            $table->string('twak_chatID')->nullable();
            $table->json('seo_description')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
