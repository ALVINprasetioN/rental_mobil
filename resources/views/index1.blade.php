<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #pilihan_mobil
        {
            display: grid;
            position: relative;
            gap: 5px;
            grid-template-columns: repeat(3, 1fr);
        }
        .card{
            margin:10px auto 10px;
        }
        .card-title{
            text-align: center;
        }
        .btn{
            background-color: ;
        }
        #popup-modal{
            
            transform: translate(35%,20%);   
            z-index: 2;
        }

    </style>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
        <div class="popup">
            <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{Session::get('message')}}</h3>
                            <button onclick="ttp()" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Hello {{$user->name}} </h1>
                    <h3>Welcome to this car rental</h3>
                    {{ __('You are logged in!') }}
                    @foreach($siswas as $mobil)
                    @if($mobil->kondisi == "disewakan")
                    <div class="pilihan_mobil" id="pilihan_mobil">
                    <div class="card" style="width: 15rem;">
                            <img class="card-img-top img-fluid img-thumbnail h-100" src="storage/{{$mobil->path}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" >{{$mobil->merek}}</h5>
                                <p class="card-title">warna : {{$mobil->warna}}</p>
                                <a href="{{route('sewa', $mobil->id)}}" method="post" class="btn btn-primary" style="width: 110px; background-color:green; margin: auto  ;" >Sewa </a>
                                @if(Auth::user()->role == 'admin')
                                 <form action="{{route('hapus_mobil',$id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-primary mx-auto mt-2 ">{{__('Delete')}}</button>
                                </form>
                                @endif
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
<script>
    function ttp(){
        document.getElementById("popup-modal").style.visibility = "hidden";
    }
</script>
@endsection
</body>
</html>