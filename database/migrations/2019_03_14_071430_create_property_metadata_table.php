<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('type', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('location')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('garages')->nullable();
            $table->integer('area')->nullable();

            // if not found in json
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('property_metadata');
    }
}
