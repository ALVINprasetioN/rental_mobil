
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .selesai{
            display: grid;
            position: relative;
            gap: 5px;
            grid-template-columns: repeat(1, 1fr);
        }

    </style>
</head>
<body>

@extends('layouts.admin_sewa')

@section('content')
<style>

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sedang disewa') }}</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($sewaa as $sewa)
                    @if($sewa->status == 2 )
                    <div class="selesai">
                            <div class="pilihan_mobil" id="pilihan_mobil">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="../storage/{{$sewa->mobil->path}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title" >{{$sewa->users->name}} | {{$sewa->users->id}}</h5>
                                        <p class="card-title">gmail : {{$sewa->users->email}}</p>
                                    </div>
                                <div class="card-body">
                                    <h5 class="card-title" >{{$sewa->mobil->merek}}</h5>
                                    <p class="card-title">warna : {{$sewa->mobil->warna}}</p>
                                    <p class="card-title">tanggal sewa : {{$sewa->sewa->tanggal}}</p>
                                    <p class="card-title">tanggal pengembalian : {{$sewa->sewa->tanggal_end}}</p>
                                    <p class="card-title">tanggal dikembalikan : {{$sewa->sewa->tanggal_ending}}</p>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title" >Denda</h5>
                                    <p class="card-title">terlambat : {{$sewa->keterlambatan}} hari</p>
                                    <p class="card-title">Denda terlambat : Rp  {{$sewa->terlambat}}</p>
                                    <p class="card-title">Denda kerusakan : Rp  {{$sewa->kerusakan}}</p>
                                    <p class="card-title">Dekripsi kerusakan :</p>
                                    <p class="card-title">{{$sewa->deskripsi_kerusakan}}</p>
                                    <br>
                                    <p class="card-title" >total denda : Rp {{$sewa->tot_denda}} </p>
                                </div>
                            </div>                            
                    </div>
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>