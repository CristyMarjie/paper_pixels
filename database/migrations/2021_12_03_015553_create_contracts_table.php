<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->string('lessor');
            $table->string('address_of_lessor');
            $table->string('lesse');
            $table->string('address_of_lesse');
            $table->string('lesse_trade_name');
            $table->string('line_of_business');
            $table->string('location');
            $table->string('floor_area');
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
        Schema::dropIfExists('contracts');
    }
}
