<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'name',
        'age',
    ];
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function mobil()
    {
        return $this->belongsToMany(Mobil::class);
    }
}
