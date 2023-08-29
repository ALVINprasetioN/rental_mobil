<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'denda';
    protected $fillable = [
        'keterlambatan',
        'terlambat',
        'kerusakan',
        'deskripsi_kerusakan',
        'users_id',
        'mobil_id',
        'sewa_id',
        'tot_denda',
    ];
    public function users()
    {
        return $this->belongsto(Users::class);
    }
    public function sewa()
    {
        return $this->belongsto(Sewa::class);
    }
    public function mobil()
    {
        return $this->belongsto(Mobil::class);
    }

}
