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
        Schema::create('winner_customer', function (Blueprint $table) {
            $table->id();
            $table->string('winner_day')->nullable();
            $table->integer('status')->default(1);
            $table->date('winner_date')->nullable();
            $table->string('description')->nullable();
            $table->integer('under_of_user');
            $table->integer('customer_id');
            $table->integer('week_id');
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
        Schema::dropIfExists('winner_customer');
    }
};
