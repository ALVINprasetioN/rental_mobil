<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    public function mobil()
    {
        return $this->belongsToMany(Mobil::class, 'sewa'); 
    }
    public function mobils()
    {
        return $this->hasOne(Mobil::class); 
    }
    public function sewa()
    {
        return $this->hasMany(Sewa::class); 
    }

}
