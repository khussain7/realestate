<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOwner extends Model
{
    use HasFactory;
    protected $fillable = 
    [
       'OwnerId'
      ,'PropertyId'
      ,'Notes'
      ,'Attachments'
      ,'CurrentStatus'
      ,'CreatedBy'
      ,'CreateOn'
      ,'UpdateBy'
      ,'UpdateOn'
      ,'created_at'
      ,'updated_at'
    ];
}
