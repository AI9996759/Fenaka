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
            $table->string('id_card')->nullable();
            $table->string('vendor_email')->nullable();
            $table->string('vendor_type')->nullable();
            $table->string('vendor_no')->nullable();
            $table->string('rejected_reson')->nullable();
            $table->string('rejected_by')->nullable();
            $table->string('rejected_date')->nullable();
            $table->string('vendor_createdby')->nullable();
            $table->string('vendor_createddate')->nullable();
            $table->string('urgent')->nullable()->default("No");
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
            $table->string('vendorcreatedby')->nullable();
            $table->string('vendorcreateddate')->nullable();
            $table->string('status')->nullable()->default("Pending");
            $table->string('edit_status')->nullable()->default("No");
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
