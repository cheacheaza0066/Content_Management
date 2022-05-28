<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Popup extends Model
{
    use HasFactory,LogsActivity;
    protected $fillable = [
        'image',
        'content',
        'startDate',
        'endDate',
    ];
    
        // LogActivity

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['image', 'content','startDate','endDate'])
        ->setDescriptionForEvent(fn(string $eventName) => " {$eventName} Popup")
        ->useLogName('Popup')
        ->logOnlyDirty();




    }
}
