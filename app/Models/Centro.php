<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'password',
    ];

    public function usuario(){
        return $this->hasMany(User::class, 'id');
    }
}
