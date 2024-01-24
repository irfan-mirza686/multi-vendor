<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->string('sku');
            $table->integer('category_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('image')->nullable();
            $table->json('other_images')->nullable();
            $table->string('quantity')->nullable();
            $table->float('item_price')->nullable();
            $table->float('discount')->default(0);
            $table->text('description')->nullable();
            $table->json('seo_data')->nullable();
            $table->integer('wholesaler_id')->comment('WholeSaler');
            $table->integer('admin_id')->comment('Admin')->default(0);
            $table->string('status')->default('inactive');
            $table->string('published')->default('no');
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
        Schema::dropIfExists('products');
    }
}