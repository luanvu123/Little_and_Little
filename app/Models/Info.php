<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
       public $timestamps = false;
    use HasFactory;
    protected $table = 'info';
    protected $fillable = [
        'text1', 'logo', 'text2', 'text3', 'text4',
        'text5', 'text6', 'text7', 'text8', 'text9',
        'text10', 'address', 'email', 'phone','phonenav'
    ];
}
