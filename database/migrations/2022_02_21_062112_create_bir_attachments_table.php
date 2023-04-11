<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bir_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('path');
            $table->string('filename');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bir_attachments');
    }
}
