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
        Schema::create('branch_scheme', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('sub_name')->nullable();
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('scheme_duration')->nullable();
            $table->string('duration_type')->default('week');
            $table->date('end_date')->nullable();
            $table->string('lucky_draw_date')->nullable();
            $table->date('joining_date')->nullable();
            $table->integer('joining_status')->default(1);
            $table->string('scheme_close')->default('no');
            $table->integer('under_of_user');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('branch_scheme');
    }
};
