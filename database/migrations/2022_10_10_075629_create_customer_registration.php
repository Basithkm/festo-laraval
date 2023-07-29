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
        Schema::create('customer_registration', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->unique();
            $table->string('gardian_name')->nullable();
            $table->string('house_name')->nullable();
            $table->string('post')->nullable();
            $table->string('pin')->nullable();
            $table->string('buliding_comany_shop')->nullable();
            $table->string('land_mark')->nullable();
            $table->string('town')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('payment_method')->default('cash');
            $table->string('transaction_id')->nullable();
            $table->string('collection_amount')->nullable();
            $table->string('collection_day')->nullable();
            $table->string('added_by')->default('me');
            $table->string('lucky_win')->default('no');
            $table->integer('winner_table_id')->default(0);
            $table->integer('under_of_user');
            $table->integer('status')->default(1);
            $table->integer('route_id');
            $table->integer('place_id');
            $table->integer('scheme_id');
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
        Schema::dropIfExists('customer_registration');
    }
};
