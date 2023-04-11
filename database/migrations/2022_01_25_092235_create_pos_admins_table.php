<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('mall_directory_id');
            $table->string('pos_name');
            $table->string('pos_email');
            $table->integer('pos_contact');

            $table->foreign('mall_directory_id')->references('id')->on('mall_directories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos_admins');
    }
}
