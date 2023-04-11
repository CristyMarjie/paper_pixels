<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCollectionAnalystsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_collection_analysts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mall_directory_id');
            $table->string('analyst_name');
            $table->string('analyst_email');
            $table->integer('analyst_contact');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('credit_collection_analysts');
    }
}
