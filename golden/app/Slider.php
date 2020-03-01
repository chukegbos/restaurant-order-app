<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{  
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'image'
    ];

    protected $dates = [
        'deleted_at', 
    ];
}
