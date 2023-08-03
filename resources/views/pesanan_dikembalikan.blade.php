
<?php

$processedIds = array();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .terima{
            margin: auto auto 10px;
        }
    </style>
</head>
<body>

@extends('layouts.user_sewa')

@section('content')
<style>

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sedang diboking') }}</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        

                        @foreach($sewa as $sewaa)
                        @if($sewaa->id == $id)
                        @foreach($sewaa->mobil as $sewaaa)
                        @foreach($sewaa->sewa as $sewaaas)
                        @if($sewaaa->kondisi == "terima" && !in_array($sewaaas->id, $processedIds) && $sewaaas->status == 1 )
                        
                        <?php $processedIds[] = $sewaaas->id; ?>
                        <div class="pilihan_mobil" id="pilihan_mobil">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="../storage/{{$sewaaa->path}}" alt="Card image cap">
    
                            <div class="card-body">
                                <h5 class="card-title" >{{$sewaaa->merek}}</h5>
                                <p class="card-title">warna : {{$sewaaa->warna}}</p>
                                <p class="card-title">tanggal sewa : {{$sewaaas->tanggal}}</p>
                                <p class="card-title">tanggal pengembalian : {{$sewaaas->tanggal_end}}</p>
                            </div>
                        </div>      
                        </div>                            
                        @endif
                        @endforeach
                        @endforeach
                        @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
</body>
</html>