<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholeSalersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whole_salers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_name')->unique();
            $table->string('username')->unique();
            $table->string('slug')->unique();
            $table->integer('package_id')->default(1)->comment('1:standard,2:custom');
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
            $table->json('seo_data')->nullable();
            $table->string('status')->default('inactive');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('lastseen')->nullable();
            $table->integer('admin_id')->default(0);
            $table->integer('approvedBy_admin')->default(0);
            $table->integer('blockedBy_admin')->default(0);
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
        Schema::dropIfExists('whole_salers');
    }
}
