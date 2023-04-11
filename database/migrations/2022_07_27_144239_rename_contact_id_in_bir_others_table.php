<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameContactIdInBirOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bir_others', function (Blueprint $table) {
            $table->dropColumn('contract_id');
            $table->string('tenant_number')->after('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bir_others', function (Blueprint $table) {
            $table->renameColumn('tenant_number', 'contract_id');
            $table->dropColumn('tenant_number');
        });
    }
}
