<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','nisn'];

    public function telepon(){
        return $this->hasMany(Telepon::class);
    }
}
