<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorizedAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorized_announcements', function (Blueprint $table) {
           $table->unsignedBigInteger('announcement_id');
           $table->string('category');

           $table->foreign('announcement_id')->references('id')->on('announcements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorized_announcements');
    }
}
