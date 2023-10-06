<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factore extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'hta',
        'dbt',
        'ob',
        'sbp',
        'tbq',
        'emb',
        'cns',
        'dlp',
        'pps',
        'rcv1',
        'rcv2',
        'rcv3',
        'rcv4',
        'rcv5',
        'asma',
        'alergia',
        'anom',
        'ear',
        'pediatrico',
        'vih',
        'hipert',
        'hipot',
    ];

}
