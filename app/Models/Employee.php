<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =['emp_name','team_id'];


    public function team() {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
