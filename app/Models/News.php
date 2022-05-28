<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = [
        'title',
        'image',
        'content',
     
    ];
    
    // LogActivity

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title', 'content','image'])
        ->setDescriptionForEvent(fn(string $eventName) => "{$eventName} News ")
        ->useLogName('News')
        ->logOnlyDirty();




    }

}
