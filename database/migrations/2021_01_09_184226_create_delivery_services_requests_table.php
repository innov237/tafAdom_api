<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryServicesRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_services_requests', function (Blueprint $table) {
            $table->id();
            $table->decimal("amout");
            $table->string("status");
            $table->BigInteger('service_request_id')->unsigned();
            $table->BigInteger('provider_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreign('service_request_id')->references('id')->on('service_requests')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_services_requests');
    }
}
