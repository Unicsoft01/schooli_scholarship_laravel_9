<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'type', 
        'sponsor',
        'cert', 
        'country',
        'about',
        'price',
        'slots',
        'status',
        'sch_img',
    ];
}
