<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_announcements', function (Blueprint $table) {
            $table->unsignedBigInteger('announcement_id');
            $table->unsignedBigInteger('tenant_id');


            $table->foreign('announcement_id')->references('id')->on('announcements');
            $table->foreign('tenant_id')->references('id')->on('tenants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specific_announcements');
    }
}
