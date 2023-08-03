<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = "sewa";
    protected $fillable = [
        'tanggal',
        'tanggal_end',
        'users_id',
        'mobil_id',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(users::class); 
    }
    public function denda()
    {
        return $this->hasOne(Denda::class); 
    }
}
