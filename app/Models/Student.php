<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course',
        'scholarship_id',
    ];

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
