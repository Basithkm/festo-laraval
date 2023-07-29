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
        Schema::create('scheme_week', function (Blueprint $table) {
            $table->id();
            $table->string('week_name')->nullable();
            $table->integer('scheme_id');
            $table->double('total_collected_amount', 11, 2)->default(0);
            $table->double('total_amount', 11, 2)->default(0);
            $table->integer('cluster_id');
            $table->integer('branch_id');
            $table->integer('total_collected_no')->default(0);
            $table->integer('total_no')->default(0);
            $table->date('drwa_date')->nullable();
            $table->string('draw_day')->nullable();
            $table->integer('winner_customer_id')->default(0);
            $table->integer('under_of_user');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('scheme_week');
    }
};
