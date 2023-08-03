<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Sewa;
use App\Models\User;
use App\Models\Mobil;
class AdminController extends Controller
{

    public function showj()
    {
    // $namess = Siswa::find($id)->name;
    // $address = Siswa::find($id)->contact->address;
    // $gurus = Siswa::find($id)->guru->name;
    // $pelajar = Guru::find($id)->siswa;
    $aktivitas = Sewa::find(3);
    return view('admin_sewa',['siswaaa'=>$aktivitas]);
    }
}
