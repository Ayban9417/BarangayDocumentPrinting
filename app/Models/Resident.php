<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_no',
        'firstname',
        'middlename',
        'lastname',
        'birth_date',
        'suffix',
        'gender',
        'phone_number',
        'sitio',
        'barangay_id',
        'status',
        'civil_status',
        'image',
    ];

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class, 'resident_id');
    }
}