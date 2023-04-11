<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RmColBirAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bir_attachments', function (Blueprint $table) {
            $table->dropColumn(['start_date','end_date']);
            $table->integer('status');
            $table->longText('status_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bir_attachments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
