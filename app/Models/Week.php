<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_name',
        'from_date',
        'to_date',
    ];

    // protected $casts = [
    //     'from_date' => 'date',
    //     'to_date' => 'date',
    // ];
}
