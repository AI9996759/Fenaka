<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 50)->unique();
            $table->string('asset_tag');
            $table->string('model')->nullable();
            $table->string('catagory')->nullable();
            $table->string('status')->nullable();
            $table->string('serial')->nullable();
            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->longText('note')->nullable();
            $table->string('os')->nullable();
            $table->string('asset_name')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('purchase_cost')->nullable();
            $table->string('supplier')->nullable();
            $table->string('order_number')->nullable();
            $table->string('warranty')->nullable();
            $table->string('used_by')->nullable();
            $table->string('location')->nullable();
            $table->string('checked_out_to')->nullable();
            $table->string('checked_checkout')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('asset');
    }
}
