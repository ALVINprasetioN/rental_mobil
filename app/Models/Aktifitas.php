<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    protected $table = 'mobil';
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
