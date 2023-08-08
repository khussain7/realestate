<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    use HasFactory;
    protected $fillable = 
    [
       'PageId'
      ,'PageName'
      ,'PageHeading'
      ,'Description'
      ,'Attachments'
      ,'CurrentStatus'
      ,'CreatedBy'
      ,'CreateOn'
      ,'UpdateBy'
      ,'UpdateOn'
    ];

    public $timestamps = false;
}
