<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'roll', 'email', 'phone', 'address', 'imgPath', 'department_id'];
    use HasFactory;

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
}
