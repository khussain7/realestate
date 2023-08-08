<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = 
    [
       'AgentId'
      ,'AgentContact'
      ,'AgentEmail'
      ,'AgentNationality'
      ,'AgentDescription'
      ,'AgentDOB'
      ,'AgentJoinDate'
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
