<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    protected $fillable = ['mapel'];
    //mapel = mata pelajaran
    public $timestamps = false;
}
