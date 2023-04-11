<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTenants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_tenants', function (Blueprint $table) {
            $table->string('person_responsible')->nullable();
            $table->string('lease_number')->nullable();
            $table->string('tenant')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('tenant_number')->nullable();
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_tenants');
    }
}
