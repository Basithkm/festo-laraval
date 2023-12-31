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
        Schema::create('customer_relation_executive', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('customer_relation_executive');
    }
};
