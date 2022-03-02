<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $fillable = [
        'roles'
    ];

    public function employees(){
        return $this->hasMany(Employee::class, 'department_id');
    }
}
