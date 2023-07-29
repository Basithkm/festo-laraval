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
        Schema::create('branch_route', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->nullable();
            $table->string('route_day')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default(1);
            $table->integer('under_of_user');
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
        Schema::dropIfExists('branch_route');
    }
};
