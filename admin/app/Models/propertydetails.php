<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertydetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'PropertyId',
        'Category',
        'SubCategory',
        'Furnished',
        'Purpose',
        'LocationGoogleLink',
        'City',
        'Address',
        'ReferanceNumber',
        'Title',
        'Description',
        'Price',
        'Area',
        'PermitNumber',
        'Bedroorms',
        'Bathrooms',
        'OccupancyStatus',
        'AgentId',
        'OwnershipStatus',
        'Rent',
        'RentFrequency',
        'MinimumContractPeriod',
        'VacatingNoticePeriod',
        'MaintenanceFee',
        'PaidBy',
        'Imageswithbanner',
        'CreatedBy',
        'CreateOn',
        'UpdateBy',
        'UpdatedOn',
        'CurrentStatus',
        'AddedAsBanner'
    ];
}
