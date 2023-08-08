<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. 2023_08_06_111222_propertydetails
     */
    public function up(): void
    {
        //
        Schema::create('propertydetails', function (Blueprint $table) {
            $table->id('PropertyId');
            //Type & Purpose
            $table->string('Category');
            $table->string('SubCategory');
            $table->string('Furnished');
            $table->string('Purpose');
            $table->string('LocationGoogleLink');
            $table->string('City');
            $table->string('Address');
            //Property Details
            $table->string('ReferanceNumber')->unique();
            $table->string('Title')->nullable();
            $table->string('Description')->nullable();
            $table->string('Price')->nullable();
            $table->string('Area')->nullable();
            $table->string('PermitNumber')->nullable();
            $table->string('Bedroorms')->nullable();
            $table->string('Bathrooms')->nullable();
            $table->string('OccupancyStatus')->nullable();
            //Contact Details
            $table->unsignedBigInteger('AgentId');
            $table->string('OwnershipStatus')->nullable();
            // Rental Details
            $table->string('Rent')->nullable(); // (AED)
            $table->string('RentFrequency')->nullable();
            $table->string('MinimumContractPeriod')->nullable();// (Months)
            $table->string('VacatingNoticePeriod')->nullable(); // (Months)
            $table->string('MaintenanceFee')->nullable(); // (AED)
            $table->string('PaidBy')->nullable();
            // ture false 
            // Image Upload
            $table->string('Imageswithbanner')->nullable();
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn')->useCurrent();
            $table->string('UpdateBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable();
            $table->timestamp('CurrentStatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('propertydetails');
    }
};
