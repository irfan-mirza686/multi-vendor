<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_name')->unique();
            $table->string('username')->unique();
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('shop_banner')->nullable();
            $table->string('cnic')->unique();
            $table->string('mobile')->unique();
            $table->json('address')->nullable();
            $table->json('settings')->nullable();
            $table->json('location')->comment('lat,long')->nullable();
            $table->json('social_links')->nullable();
            $table->string('status')->default('inactive');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('lastseen')->nullable();
            $table->string('approvedBy_admin')->default(0);
            $table->string('blockedBy_admin')->default(0);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('vendors');
    }
}