<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_contracts', function (Blueprint $table) {
            $table->string('lease_number');
            $table->string('location');
            $table->string('unit_code');
            $table->string('business_type')->nullable();
            $table->string('business_line')->nullable();
            $table->string('unit_type');
            $table->string('status')->nullable();
            $table->string('floor_area')->nullable();
            $table->date('lease_term_start');
            $table->date('lease_term_end');
            $table->string('tenant_number');
            $table->string('lessee')->nullable();
            $table->string('owner')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_contracts');
    }
}
