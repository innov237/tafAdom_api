<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryRequestReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_request_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('mark');
            $table->bigInteger("delivery_request_id")->unsigned();
            $table->foreign('delivery_request_id')->references('id')->on('delivery_services_requests')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_request_reviews');
    }
}
