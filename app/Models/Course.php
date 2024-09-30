<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('progress');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
