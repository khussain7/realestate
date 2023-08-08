<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyAmenities extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'PropertyId',
        'BarbequeArea',
        'DayCareCenter',
        'KidsPlayArea',
        'LawnOrGarden',
        'CafeteriaOrCanteen',
         'HealthAndFitness',
         'GymOrHealthClub',
         'Jacuzzi',
         'Sauna',
         'SteamRoom',
         'SwimmingPool',
         'FacilitiesForDisabled',
         'LaundryRoom',
         'LaundryFacility',
         'SharedKitchen',
         'CompletionYear',
         'BalconyOrTerrace',
         'LobbyInBuilding',
         'Flooring',
         'ElevatorsInBuilding',
         'ServiceElevators',
         'PrayerRoom',
         'ReceptionOrWaitingRoom',
         'BusinessCenter',
         'SecurityStaff',
         'CCTVSecurity',
         'View',
         'Floor',
         'OtherMainFeatures',
         'Freehold',
         'PetPolicy',
         'OtherRooms',
         'ATMFacility',
         'OtherFacilities',
         'LandArea',
         'NumberOfBathrooms',
         'NumberOfBedrooms',
         'NearbySchools',
         'NearbyHospitals',
         'NearbyShoppingMalls',
         'DistanceFromAirport',
         'NearbyPublicTransport',
         'OtherNearbyPlaces',
         'BroadbandInternet',
         'SatelliteCableTV',
         'Intercom',
         'Features',
         'DoubleGlazedWindows',
         'CentrallyAirConditioned',
         'CentralHeating',
         'ElectricityBackup',
         'Furnished',
         'ParkingSpaces',
         'StorageAreas',
         'StudyRoom',
         'WasteDisposal',
         'MaintenanceStaff',
         'CleaningServices',
         'CreatedBy',
         'CreateOn',
         'UpdateBy',
         'UpdatedOn',
         'CurrentStatus'
    ];
}
