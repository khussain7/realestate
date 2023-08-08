<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. 2023_08_07_074526_property_amenities
     */
    public function up(): void
    {
        //
        Schema::create('propertyamenities', function (Blueprint $table) {
            //Recreation and Family
            $table->id('PropertyId');
            $table->string('BarbequeArea')->nullable();
            $table->string('DayCareCenter')->nullable();
            $table->string('KidsPlayArea')->nullable();
            $table->string('LawnOrGarden')->nullable();
            $table->string('CafeteriaOrCanteen')->nullable();
            //Health and Fitness
            $table->string('HealthAndFitness')->nullable();
            $table->string('GymOrHealthClub')->nullable();
            $table->string('Jacuzzi')->nullable();
            $table->string('Sauna')->nullable();
            $table->string('SteamRoom')->nullable();
            $table->string('SwimmingPool')->nullable();
            $table->string('FacilitiesForDisabled')->nullable();
            // Laundry and Kitchen
            $table->string('LaundryRoom')->nullable();
            $table->string('LaundryFacility')->nullable();
            $table->string('SharedKitchen')->nullable();
            // Building
            $table->string('CompletionYear')->nullable();
            $table->string('BalconyOrTerrace')->nullable();
            $table->string('LobbyInBuilding')->nullable();
            $table->string('Flooring')->nullable();
            $table->string('ElevatorsInBuilding')->nullable();
            $table->string('ServiceElevators')->nullable();
            $table->string('PrayerRoom')->nullable();
            $table->string('ReceptionOrWaitingRoom')->nullable();
            // Business and Security
            $table->string('BusinessCenter')->nullable();
            $table->string('ConferenceRoom')->nullable();
            $table->string('SecurityStaff')->nullable();
            $table->string('CCTVSecurity')->nullable();
            // ture false
            // Miscellaneous
            $table->string('View')->nullable();
            $table->string('Floor')->nullable();
            $table->string('OtherMainFeatures')->nullable();
            // Freehold
            $table->string('Freehold')->nullable();
            $table->string('PetPolicy')->nullable();
            $table->string('OtherRooms')->nullable();
            $table->string('ATMFacility')->nullable();
            $table->string('OtherFacilities')->nullable();
            $table->string('LandArea')->nullable();
            //Maids Room
            $table->string('NumberOfBathrooms')->nullable();
            $table->string('NumberOfBedrooms')->nullable();
            $table->string('NearbySchools')->nullable();
            $table->string('NearbyHospitals')->nullable();
            $table->string('NearbyShoppingMalls')->nullable();
            $table->string('DistanceFromAirport')->nullable();
            $table->string('NearbyPublicTransport')->nullable();
            $table->string('OtherNearbyPlaces')->nullable();
            // Technology
            $table->string('BroadbandInternet')->nullable();
            $table->string('SatelliteCableTV')->nullable();
            $table->string('Intercom')->nullable();
            $table->string('Features')->nullable();
            $table->string('DoubleGlazedWindows')->nullable();
            $table->string('CentrallyAirConditioned')->nullable();
            $table->string('CentralHeating')->nullable();
            $table->string('ElectricityBackup')->nullable();
            $table->string('Furnished')->nullable();
            $table->string('ParkingSpaces')->nullable(); //1
            $table->string('StorageAreas')->nullable();
            $table->string('StudyRoom')->nullable(); 
            //Cleaning and Maintenance
            $table->string('WasteDisposal')->nullable();
            $table->string('MaintenanceStaff')->nullable();
            $table->string('CleaningServices')->nullable();
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
        Schema::dropIfExists('propertyamenities');
    }
};
