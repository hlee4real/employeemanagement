<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'name',
        'username',
        'password',
        'identity',
        'address',
        'phone',
        'datesigned'
    ];

    function department(){
        return $this->belongsTo(Department::class, 'id', 'id');
    }
}
