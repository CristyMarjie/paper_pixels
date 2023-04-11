<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfficialReceiptImports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_receipt_imports', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_number');
            $table->string('or_number');
            $table->string('or_date');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('official_receipt_imports');

    }
}
