<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantAttachablesLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_attachables_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('attachable_id');
            $table->string('attachable_type');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant_attachables_logs');
    }
}
