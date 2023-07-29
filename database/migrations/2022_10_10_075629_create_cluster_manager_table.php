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
        Schema::create('cluster_manager', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('place')->nullable();
            $table->string('mobile')->unique();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('added_by')->default('admin');
            $table->integer('under_of_user');
            $table->integer('status')->default(1);
            $table->integer('cluster_id');
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
        Schema::dropIfExists('cluster_manager');
    }
};
