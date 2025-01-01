<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $table = 'hobis';
    protected $fillable = ['name'];

}
