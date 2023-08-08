<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    use HasFactory;
   
    protected $fillable = 
    [
       'OwnerId'
      ,'PropertyOwnerContact'
      ,'PropertyOwnerEmail'
      ,'PropertyOwnerNationality'
      ,'PropertyOwnerNotes'
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
