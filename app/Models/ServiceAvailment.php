<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAvailment extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_name',
        'contact_number',
        'service_type',
        'incident_location',
        'status',
    ];
}