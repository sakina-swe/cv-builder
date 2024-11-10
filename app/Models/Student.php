<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'nt_id',
        'photo',
        'phone',
        'profession',
        'biography',
    ];

    public $timestamps = false;

//    public function languages(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(Language::class, 'language_student');
//    }

}
