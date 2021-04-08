<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'location'];
    use HasFactory;

    public function Students()
    {
        //return $this->hasMany(Student::class);
        return $this->hasMany(Student::class, 'department_id', 'id');
    }

    public static function arrayForSelect()
    {
        $departments = Department::all();
        $arr = [];
        foreach($departments as $department)
        {
            $arr[$department->id] = $department->name;
        }
        return $arr;
    }
}
