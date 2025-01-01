<?php

namespace App\Models;

use App\Models\Nisn;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['name'];

    public function nisn(){
        return $this->hasOne(Nisn::class);
    }

}
