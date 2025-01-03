<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = 'telepons';
    protected $fillable = ['telepon', 'student_id'];

    public function people(){
        return $this->belongsTo(Student::class);
    }
}
