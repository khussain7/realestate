<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyimages extends Model
{
    use HasFactory;
    protected $fillable = 
    [
      'Id'
      ,'PropertyId'
      ,'ImageName'
      ,'IsBannner'
      ,'CurrentStatus'
      ,'CreatedBy'
      ,'CreateOn'
      ,'UpdateBy'
      ,'UpdateOn'
      ,'created_at'
      ,'updated_at'
    ];
}
