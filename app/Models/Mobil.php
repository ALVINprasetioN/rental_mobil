<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $fillable = [
        'merek',
        'warna',
        'path',
        'kondisi',
    ];
    public function users()
    {
        return $this->belongsToMany(Users::class);
    }
    public function userss()
    {
        return $this->belongsTo(Users::class);
    }
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
