<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banners_history extends Model
{
    use HasFactory;
    protected $fillable = 
    [
      'HistoryId'  
     ,'PropertyId'
     ,'PerformActivity'
     ,'CreatedBy'
     ];
}
