<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusFieldSoaimport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soa_imports', function (Blueprint $table) {
            $table->integer('status')->default(1)->after('period_start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soa_imports', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
