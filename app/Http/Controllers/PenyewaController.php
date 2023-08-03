<?php

namespace App\Http\Controllers;
use App\Departments as DerpartmentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penyewa;
use App\Models\Users;
use App\Models\Sewa;
use App\Models\Siswa;
use App\Models\Mobil;
use App\Models\Aktifitas;
use App\Models\Aktivitas;
class PenyewaController extends Controller
{
    
    public function login()
    {
        return view('auth.login');
    }

    public function index()
    {
        return redirect()->route('login');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $user = Auth::user();
        $id = Auth::id();
        // $siswas = Siswa::all();
        $siswas = Penyewa::paginate(2);
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        return view('home',['user' => $user,'id' => $id]);
    }


    public function waiting(Request $request)
    {
        // $namess = Siswa::find($id)->name;
        // $address = Siswa::find($id)->contact->address;
        // $gurus = Siswa::find($id)->guru->name;
        // $pelajar = Guru::find($id)->siswa;
        $aktivitas = Users::all();
        $uid = Auth::id();
        $request->session()->flash('waiting','active');
        $request->session()->forget('disewa');
        $request->session()->forget('dikembalikan');
        return view('user_sewa',['sewa'=>$aktivitas,'id'=>$uid]);
    }
    public function pesanan_disewa(Request $request)
    {
        // $namess = Siswa::find($id)->name;
        // $address = Siswa::find($id)->contact->address;
        // $gurus = Siswa::find($id)->guru->name;
        // $pelajar = Guru::find($id)->siswa;
        $aktivitas = Users::all();
        $uid = Auth::id();
        $request->session()->flash('disewa','active');
        $request->session()->forget('waiting');
        $request->session()->forget('dikembalikan');
        return view('pesanan_disewa',['sewa'=>$aktivitas,'id'=>$uid]);
    }
    public function pesanan_dikembalikan(Request $request)
    {
        // $namess = Siswa::find($id)->name;
        // $address = Siswa::find($id)->contact->address;
        // $gurus = Siswa::find($id)->guru->name;
        // $pelajar = Guru::find($id)->siswa;
        $aktivitas = Users::all();
        $uid = Auth::id();
        $request->session()->flash('dikembalikan','active');
        $request->session()->forget('waiting');
        $request->session()->forget('disewa');
        return view('pesanan_dikembalikan',['sewa'=>$aktivitas,'id'=>$uid]);
    }


    public function diboking(Request $request)
    {
        $aktivitas = Users::all();
        $aktivitass = Mobil::all();
        $aktivitasss = Sewa::all();
        $request->session()->flash('bokingan','active');
        $request->session()->forget('disewa');
        $request->session()->forget('bokingan');
        $request->session()->forget('denda');
        $request->session()->forget('selesai');
        return view('admin_sewa',['sewa'=>$aktivitas,'mobil'=>$aktivitass,'sewas'=>$aktivitasss]);
    }

    public function denda(Request $request)
    {
        $aktivitas = Users::all();
        $aktivitass = Mobil::all();
        $aktivitasss = Sewa::all();
        $request->session()->flash('denda','active');
        $request->session()->forget('disewa');
        $request->session()->forget('bokingan');
        $request->session()->forget('terima');
        $request->session()->forget('selesai');
        return view('denda',['sewa'=>$aktivitas,'mobil'=>$aktivitass,'sewas'=>$aktivitasss]);
    }
    public function tersewa(Request $request)
    {
        $aktivitas = Users::all();
        $request->session()->flash('disewa','active');
        $request->session()->forget('bokingan');
        $request->session()->forget('terima');
        $request->session()->forget('denda');
        $request->session()->forget('selesai');
        return view('tersewa',['sewa'=>$aktivitas]);
    }
    public function terima(Request $request)
    {
        $aktivitas = Users::all();
        $request->session()->flash('terima','active');
        $request->session()->forget('bokingan');
        $request->session()->forget('disewa');
        $request->session()->forget('denda');
        $request->session()->forget('selesai');
        return view('terima',['sewa'=>$aktivitas]);
    }
    public function selesai(Request $request)
    {
        $user = Users::all();
        $request->session()->flash('selesai','active');
        $request->session()->forget('bokingan');
        $request->session()->forget('disewa');
        $request->session()->forget('denda');
        $request->session()->forget('terima');
        return view('selesai',['sewa'=>$user]);
    }

    public function show()
    {
    // $namess = Siswa::find($id)->name;
    // $address = Siswa::find($id)->contact->address;
    // $gurus = Siswa::find($id)->guru->name;
    // $pelajar = Guru::find($id)->siswa;
    $aktivitas = Siswa::find(1)->mobil;
    
    return view('show',['siswaaa'=>$aktivitas]);
    }

}
