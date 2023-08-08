<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('PropertyId');
            $table->string('PropertyName');
            $table->string('ReferanceNumber')->unique();
            $table->string('Category')->nullable();
            $table->string('PropertyType')->nullable();
            $table->unsignedBigInteger('PropertyOwnerId');
            $table->string('Area')->nullable();
            $table->float('Price')->nullable();
            $table->integer('Beds')->nullable();
            $table->integer('Bath')->nullable();
            $table->integer('Parking')->nullable();
            $table->string('GoogleLink')->nullable();
            $table->string('Balcony')->nullable();
            $table->string('Terrace')->nullable();
            $table->string('CentralHeating')->nullable();
            $table->string('ACType')->nullable();
            $table->string('WasteDisposal')->nullable();
            $table->string('Electricity')->nullable();
            $table->text('Attachments')->nullable();
            $table->string('CurrentStatus')->default('active');
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn')->useCurrent();
            $table->string('UpdateBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable();
            $table->string('AirportDistance')->nullable();
            $table->string('ParkDistance')->nullable();
            $table->string('HospitalDistance')->nullable();
            $table->string('MedicalStore')->nullable();
            $table->string('GroceryStoreCount')->nullable();
            $table->string('ResturantsCount')->nullable();
            $table->string('AddedAsBanner')->nullable();
            $table->timestamps();
            // $table->foreign('CreatedBy')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('PropertyOwnerId')->references('id')->on('owner')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }

    // ...

    /**
     * Set the CreatedBy attribute with the current authenticated user's ID.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setCreatedByAttribute($value)
    {
        $this->attributes['CreatedBy'] = Auth::id();
    }

    // ...
};
