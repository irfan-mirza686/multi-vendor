<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholeSalerSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whole_saler_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id')->unique();
            $table->integer('wholesaler_id');
            $table->integer('pkg_id')->comment('1:standard,2:custom');
            $table->integer('pkg_limit')->comment('qty');
            $table->float('price');
            $table->date('approve_date');
            $table->string('status')->default('pending');
            $table->integer('approvedBy_admin');
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
        Schema::dropIfExists('whole_saler_subscriptions');
    }
}
