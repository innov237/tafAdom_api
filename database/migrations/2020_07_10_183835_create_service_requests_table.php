<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->date("data_solicitation");
            $table->time("solicitation_hour");
            $table->integer("days_remaining");
            $table->BigInteger('service_id')->unsigned();
            $table->BigInteger('user_id')->unsigned();
            $table->BigInteger('delivery_address_id')->unsigned();
            $table->string("time_solicitation");
            
            $table->foreign('delivery_address_id')->references('id')->on('delivery_addresses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('service_requests');
    }
}
