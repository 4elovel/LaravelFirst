<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyUsers extends Model
{
    use HasFactory;
    protected $table = 'my_users';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'code',
    ];
}
