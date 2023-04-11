<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->enum('notice_type',['FIRST_NOTICE','SECOND_NOTICE','THIRD_NOTICE','TURNOVER_NOTICE']);
            $table->longText('notice_details');
            $table->string('path')->nullable();
            $table->foreign('tenant_id')->references('id')->on('tenants');
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
        Schema::dropIfExists('notices');
    }
}
