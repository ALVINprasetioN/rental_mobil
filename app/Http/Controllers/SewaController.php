<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Penyewa;
use App\Models\Users;
use App\Models\Denda;
use App\Models\Sewa;
use App\Models\Mobil;
class SewaController extends Controller
{
    public function tersewa_trm(Request $request)
    {   
        $mbll = Mobil::find($request->idd);
        $mbll->kondisi = 'tersewa';
        $mbll->save();
        return Redirect::route('admin_sewa');
    }
    public function tersewa_tlk(Request $request)
    {   
        $mbll = Mobil::find($request->idd);
        $mbll->kondisi = 'disewakan';
        $mbll->save();
        $mblll = Sewa::find($request->iddd);
        $mblll->status = 0;
        $mblll->save();
        return Redirect::route('admin_sewa');
    }
    public function sewa(Mobil $mobil)
    {
        return view('sewa',['mobil'=>$mobil]);
    }
    public function proses_sewa(Request $request)
    {
        $uid = Auth::id();
        $swa = Sewa::all();
        $swas = Sewa::all();
        $sewa = Sewa::where('users_id', $uid)->get();
        $sewaid = array();
        foreach($sewa as $sewaa)
        {
            $sewaid[] = $sewaa->status; 
        }
        if(in_array(1,$sewaid))
        {
            $request->session()->flash('message','Anda sedang menyewa mobil silahkan periksa di pesanan saya');
            return redirect()->route('home');
        }else{
            if($request->tanggal >= $request->tanggal_end){
                $request->session()->flash('message','tanggal pengembalian mobil harus lebih besar silahkan coba kembali');
                return redirect()->back();
            }else{
                Sewa::create([
                    'tanggal' => $request->tanggal,
                    'tanggal_end' => $request->tanggal_end,
                    'users_id' => $uid,
                    'mobil_id' => $request->idd,
                    'status' => 1,
                ]);
                $mbll = Mobil::find($request->idd);
                $mbll->kondisi = 'diboking';
                $mbll->save();
                
            }
        }
        return redirect()->route('home');
    }
    public function very()
    {

        // $namess = Siswa::find($id)->name;
        // $address = Siswa::find($id)->contact->address;
        // $gurus = Siswa::find($id)->guru->name;
        // $pelajar = Guru::find($id)->siswa;
        $aktivitas = Sewa::find(1);
        return view('admin_sewa',['siswaaa'=>$aktivitas]);

    }
    public function denda_form(Request $request)
    {

        $denda = Denda::where('mobil_id', $request->idd)->get();
        $dendahr = array();
        foreach($denda as $dendaa)
        {
            $dendahr[] = $dendaa->keterlambatan; 
        }
        return view('denda_form',['denda'=>$denda ]);
    }
    public function denda_lunas(Request $request)
    {
        # 0/null = belum terbayar / 1 = sudah terbayar
        $denda_lunas = Denda::find($request->id_denda);
        $denda_lunas->status = 1 ;
        $demda_lunas->save();
        return Redirect()->back();  
    }
}
