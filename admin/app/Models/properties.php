<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = 
    [
      'PropertyId'  
     ,'PropertyName'
     ,'ReferanceNumber'
     ,'Category'
     ,'MainSubCategoryId'
     ,'MainSubCategory'
     ,'PropertyType'
     ,'PropertyOwnerId'
     ,'Area'
     ,'Price'
     ,'Beds'
     ,'Bath'
     ,'City'
     ,'Parking'
     ,'GoogleLink'
     ,'Balcony'
     ,'Terrace'
     ,'CentralHeating'
     ,'ACType'
     ,'WasteDisposal'
     ,'Electricity'
     ,'Attachments'
     ,'CurrentStatus'
     ,'CreatedBy'
     ,'CreateOn'
     ,'UpdateBy'
     ,'UpdateOn'
     ,'AirportDistance'
     ,'ParkDistance'
     ,'HospitalDistance'
     ,'MedicalStore'
     ,'GroceryStoreCount'
     ,'ResturantsCount'
     ,'AddedAsBanner'
     ,'created_at'
     ,'updated_at'];
}
