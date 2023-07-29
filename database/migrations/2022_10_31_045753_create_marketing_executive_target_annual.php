<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingExecutiveTargetAnnual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_executive_target_annual', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('year_id');
            $table->integer('target');
            $table->integer('archived');
            $table->integer('cluster_id');
            $table->integer('branch_id');
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
        Schema::dropIfExists('marketing_executive_target_annual');
    }
}
