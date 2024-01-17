<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id','pelajaran_id',
        'lat1','lat2','lat3','lat4',
        'uh1','uh2',
        'uts','us'
    ];
    //lat = latihan, uh = ulangan harian, uts = ulangan tengah semester, us = ulangan semester
    public $timestamps = false;

    public function siswa(){
        return $this->hasMany(Siswa::class, 'siswa_id','_id');
    }

    public function pelajaran(){
        return $this->belongsTo(Pelajaran::class) ;
    }
}
