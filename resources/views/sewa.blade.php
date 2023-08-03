<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Document</title>
    <style>
#popup-modal{
    position: absolute;
    transform: translate(30%,20%);   
    z-index: 2;

}
#popup-modal2{
    position: absolute;
    transform: translate(30%,20%);   
    z-index: 3;

}
.popup{
    width: 100%;
    height: 100vh;
    background-color: rgba(0,0,0,.8);
    position: fixed;
    top: 0;
    left: 0;
    visibility: hidden;
}
.popup2{
    width: 100%;
    height: 100vh;
    background-color: rgba(0,0,0,.8);
    position: fixed;
    top: 0;
    left: 0;
    visibility: hidden;
}
#popup-modal4{
    transform: translate(35%,20%);   
    z-index: 2;
}
    </style>
</head>
<body>
@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sewa mobil') }}</div>
                @if(Session::has('message'))
                <div class="popup4">
                    <div id="popup-modal4" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{Session::get('message')}}</h3>
                                    <button onclick="ttp()" data-modal-hide="popup-modal4" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                 <div class="card-body">
                    <form method="POST" action="{{ route('sewa_stor') }}">
                        @csrf
                        <img src="../storage/{{$mobil->path}}" alt="" height="200px">
                        <div class="row mb-3">
                            <label for="merek" class="col-md-4 col-form-label text-md-end">{{ __('Merek') }} :</label>
                            <label for="merek" class="col-md-2 col-form-label ">{{$mobil->merek}}</label>
                        </div>
                        <div class="row mb-3">
                            <label for="warna" class="col-md-4 col-form-label text-md-end">{{ __('Warna') }} :</label>
                            <label for="warna" class="col-md-2 col-form-label  ">{{$mobil->warna}}</label>
                        </div>

                        <input id="idd" type="hidden" class="form-control @error('idd') is-invalid @enderror" name="idd" value="{{$mobil->id}}">
                        <div class="row mb-3">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Mulai') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date"  min="<?php echo date("Y-m-d"); ?>" class="form-control datepicker @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal">

                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_end" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal selesai') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_end" type="date" class="form-control datepicker @error('tanggal_end') is-invalid @enderror" name="tanggal_end" value="{{ old('tanggal_end') }}" required autocomplete="tanggal_end">

                                @error('tanggal_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" onclick="ss()" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                        <div class="popup">

                            <div id="popup-modal" tabindex="-1" class="aa fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-3 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu yakin ingin sewa?</h3>
                                            <button data-modal-hide="popup-modal"  type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                OKE
                                            </button>
                                            <button data-modal-hide="popup-modal" onclick="ss3()" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                no
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function ttp(){
    document.getElementById("popup-modal4").style.visibility = "hidden";
}
const input = document.getElementById("tanggal");
const input2 = document.getElementById("tanggal_end");
let messages=[]
function ss() {
    
    if (input.value !== "" && input2.value !== "" ){
        document.getElementById("popup-modal").style.visibility = "visible";
    }else{
        alert('date is required')
    }
}
function ss3() {
  document.getElementById("popup-modal").style.visibility = "hidden";
}
</script>
@endsection

</body>
</html>