<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 50)->unique();
            $table->string('name');
            $table->string('reg_no')->nullable();
            $table->string('address');
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('website')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('agreement');
            $table->string('file');
            $table->string('location');
            $table->string('email');
            $table->string('createdby');
            $table->string('status')->nullable()->default("Pending");
            $table->string('editby')->nullable();
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
        Schema::dropIfExists('vendor');
    }
}
