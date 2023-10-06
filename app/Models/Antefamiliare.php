<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antefamiliare extends Model
{
    use HasFactory;

    protected $fillable=[
        'padron_id',
        'htam',
        'htap',
        'htah',
        'cardiom',
        'cardiop',
        'cardioh',
        'dbtm',
        'dbtp',
        'dbth',
        'acvm',
        'acvp',
        'acvh',
        'cacm',
        'cacp',
        'cach',
        'carm',
        'carp',
        'carh',
        'camm',
        'camp',
        'camh',
        'caom',
        'caop',
        'caoh',
        'abudm',
        'abudp',
        'abudh',
        'abuhm',
        'abuhp',
        'abuhh',
        'deprem',
        'deprep',
        'depreh',
        'discam',
        'discap',
        'discah',
        'msubm',
        'msubp',
        'msubh'
    ];    
}
