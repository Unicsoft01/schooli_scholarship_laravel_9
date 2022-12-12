<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $fillable = [
        'sch_id',
        'user_id',
        'payable',
        'pmt_status',
        'status',
    ];
}
	
	
	
	
