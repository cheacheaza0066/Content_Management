<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model
{
    use HasFactory,LogsActivity,Sortable;

    protected $fillable = [
        'title',
        'image',
        'content',
        'created_at',
    ];
    

	public $sortable = ['id','title','created_at'];



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
