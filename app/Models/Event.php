<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'title_order',
        'start_date',
        'end_date',
        'price',
        'status',
        'image',
        'image2',
        'image3',
        'description1',
        'description2',
        'description3',
        'ngaytao',
        'ngaycapnhat',
    ];
}
