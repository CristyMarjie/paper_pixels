<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnnouncementAddFilenameField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('filename')->after('description')->nullable();
            $table->string('path')->after('filename')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn('filename');
            $table->dropColumn('path');
        });
    }
}
