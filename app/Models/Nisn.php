<?php

namespace App\Models;


use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;

class Nisn extends Model
{
    protected $table = 'nisns';
    protected $fillable = ['nisn','siswa_id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class,);
    }
}
