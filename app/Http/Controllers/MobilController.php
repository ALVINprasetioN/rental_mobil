<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Car;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;
use App\Models\Sewa ;
use App\Models\Denda;
use Carbon\Carbon;

class MobilController extends Controller
{
    public function create()
    {
        return view("create_mobil");
    }
    public function kirim_fots(Request $request)
    {
        $file = $request->file('file');
        $merek = $request->merek;   
        $warna = $request->warna;
        $path = time()."-".$merek."-".$warna."-".$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path,file_get_contents($file));
        Mobil::create([
            'merek'=>$merek,
            'warna'=>$warna,
            'path'=>$path
        ]);
        
        return Redirect::back();
    }

    public function kembalikan_disewa(Request $request)
    {
        $current = Carbon::now();
        $currentt = Carbon::now()->format('y-m-d');
        $tgl_akhir = Carbon::parse($request->tglend);

        $result = $current->diffInDays($tgl_akhir, false);
        $variable = abs($result);
        $denda_terlambat = $variable * 20000 ;
        $uid = Auth::id();
        if($current <= $request->tglend)
        {
            Denda::create([
                'keterlambatan' => 0,
                'terlambat' => 0,
                'users_id' => $uid,
                'sewa_id' => $request->iddd,
                'mobil_id' => $request->idd,
            ]);
            $mbl1 = Sewa::find($request -> iddd);
            $mbl1->tanggal_ending = $currentt ;
            $mbl1->save();
            $mbl = Mobil::find($request->idd);
            $mbl->kondisi = 'terima' ;
            $mbl->save();
        }else{
            Denda::create([
                'keterlambatan' => $variable,
                'terlambat' => $denda_terlambat,
                'users_id' => $uid,
                'sewa_id' => $request->iddd,
                'mobil_id' => $request->idd,
            ]);
            $mbl1 = Sewa::find($request -> iddd);
            $mbl1->tanggal_ending = $currentt ;
            $mbl1->save();
            $mbl = Mobil::find($request -> idd);
            $mbl->kondisi = 'terima' ;
            $mbl->save();
            
        }
        return Redirect()->back();
    }
    public function denda_sewa_store(Request $request,Denda $denda)
    {
        if($request->keterlambatan == 0 and $request->kerusakan == ''){
            $denda->update([
                'score' => $request->score
            ]);
            $mbl = Mobil::find($request->mobil_idd);
            $mbl->kondisi = 'disewakan' ;
            $mbl->save();
            $mbl = Sewa::find($request->sewa_id);
            $mbl->status = 2 ;
            $mbl->save();
        }else{
            $mbl = Mobil::find($request->mobil_idd);
            $mbl->kondisi = 'denda' ;
            $mbl->save();
            $mbl1 = Denda::find($request->iddd);
            $mbl1->kerusakan = $request->kerusakan ;
            $mbl1->save();
            $mbl2 = Denda::find($request->iddd);
            $mbl2->deskripsi_kerusakan =  $request->deks_kerusakan ;
            $mbl2->save();
            $mbl3 = Denda::find($request->iddd);
            $mbl3->tot_denda =  $request->kerusakan +  $request->terlambat  ;
            $mbl3->save();
        }
        return Redirect()->route('admin_terima');
    }
    public function bayar_store(Request $request)
    {
        $mbl1 = Denda::find($request->denda_id);
        $mbl1->status = 1 ;
        $mbl1->save();
        return Redirect()->back();
    }

    public function show(Mobil $mobil)
    {
        $user = Auth::user();
        $id = Auth::id();
        
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        // $siswas = Mobil::all();
         $siswas = Mobil::all();
        // $siswas = Mobil::paginate(2);

        return view('index',['siswas'=>$siswas,"mobill"=>$mobil,'user' => $user,'id' => $id]);
    }
    public function delete(Mobil $mobil)
    {
        Storage::delete('public/'.$mobil->path);
        $mobil->delete();
        return Redirect::route('home');
    }
    
}
