<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'document',
        'contact',
        'registration',
    ];

    public static function generateRegistrationNumber($lastInsertId): string
    {
        $year = date('Y');
        $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

        return $year . $lastInsertId . $randomNumber;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
