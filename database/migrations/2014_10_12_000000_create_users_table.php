<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    protected $dates = ['deleted_at'];

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('address')->nullable();
            $table->date('lastseen')->nullable();
            $table->json('social_links')->nullable();
            $table->string('status')->default('inactive');
            $table->integer('admin_id')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
