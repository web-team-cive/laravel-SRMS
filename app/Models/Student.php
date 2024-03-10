<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'username', 'pwd', 'grade', 'parent_id',
    ];

    protected $hidden = [
        'pwd', // Hide the password from JSON responses
    ];

    // Define the relationship with the parent
    // public function parent()
    // {
    //     return $this->belongsTo(Parent::class);
    // }
}
