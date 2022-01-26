<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company',
        'role',
        'start_date',
        'end_date',
        'description',
    ];

    public function setStartDateAttribute($value)
    {
        if ($value) {
            $this->attributes['start_date'] = Carbon::parse($value);
        } else {
            return null;
        }
    }

    public function setEndDateAttribute($value)
    {
        if ($value) {
            $this->attributes['end_date'] = Carbon::parse($value);
        } else {
            return null;
        }
    }
}
