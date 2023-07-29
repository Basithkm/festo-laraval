<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchemeAmountAndTotalamountBranchSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('branch_scheme', function (Blueprint $table) {
            //
            $table->double('scheme_amount', 11, 2)->default(200)->after('scheme_close');
            $table->double('total_amount', 11, 2)->default(200)->after('scheme_amount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
