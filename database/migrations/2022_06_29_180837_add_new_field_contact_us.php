<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenant_contact_us', function (Blueprint $table) {
            $table->integer('intended_to_id')->default(1)->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenant_contact_us', function (Blueprint $table) {
            $table->dropColumn('intended_to_id');
        });
    }
}
