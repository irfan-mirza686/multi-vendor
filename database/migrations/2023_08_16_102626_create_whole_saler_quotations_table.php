<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholeSalerQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whole_saler_quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('wholesaler_id');
            $table->integer('product_id');
            $table->integer('vendor_id');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('whole_saler_quotations');
    }
}
