<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAgent extends Model
{
    use HasFactory;
    protected $fillable = 
    [
       'AgentId'
      ,'PropertyId'
      ,'AgentStartDate'
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
