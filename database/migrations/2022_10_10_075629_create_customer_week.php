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
        Schema::create('customer_week', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('scheme_id');
            $table->integer('cluster_id');
            $table->integer('branch_id');
            $table->integer('week_id');
            $table->string('colleted_day')->nullable();
            $table->string('colleted_date')->nullable();
            $table->integer('paid')->default(0);
            $table->integer('colleted_user_id')->default(0);
            $table->string('paid_type')->nullable();
            $table->integer('un_paid')->default(0);
            $table->string('unpaid_reasone')->nullable();
            $table->double('colleted_amount', 11, 2)->default(0);
            $table->string('lucky_win')->default('no');
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
        Schema::dropIfExists('customer_week');
    }
};
