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
        'sch_name',
        'sponsor',
        'type',
        'cert_file',
        'resume',
        'letter_recommend',
        'passport',
        'eng_prof',
        'sop',
        'addition',
        'pmt_proof',
        'degree',
    ];
}
	

	
	
