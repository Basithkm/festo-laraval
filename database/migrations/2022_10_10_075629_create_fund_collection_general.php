<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_collection_general', function (Blueprint $table) {
            $table->id();
            $table->string('place_name')->nullable();
            $table->integer('customer_id');
            $table->string('week_id');
            $table->string('week_day');
            $table->string('amount')->default('200');
            $table->string('aduvance_amount')->default('0');
            $table->string('payment_method')->default('cash');
            $table->string('transaction_mode')->default('payed');
            $table->string('reasone')->nullable();
            $table->string('added_by')->default('ce');
            $table->integer('under_of_user');
            $table->integer('route_id');
            $table->integer('place_id');
            $table->integer('cluster_id');
            $table->integer('branch_id');
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
        Schema::dropIfExists('fund_collection_general');
    }
};
