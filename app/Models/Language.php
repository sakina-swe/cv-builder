<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'level'];

//    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(Student::class, 'language_student');
//    }
}
