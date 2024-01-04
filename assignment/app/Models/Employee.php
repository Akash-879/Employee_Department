<?php
namespace App\Models;
// namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'salary', 'dept_id', 'hobbies', 'gender'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
