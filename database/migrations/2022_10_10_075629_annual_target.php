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
        Schema::create('annual_target', function (Blueprint $table) {
            $table->id();
            $table->string('target')->nullable();
            $table->string('archived')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('cluster_manager_id');
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
        Schema::dropIfExists('annual_target');
    }
};