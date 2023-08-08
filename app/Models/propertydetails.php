<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertydetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'Property_Name',
        'Property_Description',
        'Property_Price',
        'Property_Bedrooms',
        'Property_Bath',
        'Property_Category',
         'Property_Current_Status',
         'Property_Location',
         'Property_Map_Link',
         'Created_By',
         'created_at',
         'Property_Images',
         'Updated_By',
         'updated_at',
         'Property_Attachments',
         'Property_Size'
    ];
}
