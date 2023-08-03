<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'users';
    public function mobil()
    {
        return $this->belongsToMany(Mobil::class); 
    }
    
    public function aktifitas()
    {
        return $this->belongsToMany(Aktifitas::class);
    }

}
