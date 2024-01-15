<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
class Siswa extends Model
{
    use HasFactory;

    protected $collection = 'siswa';
    protected $fillable = ['nama','kelas_id'];
    public $timestamps = false;
}
