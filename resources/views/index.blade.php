<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentay mobil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .download-app{
            height: 35px;
            width: 130px;
            float: right ;
        }
        nav{
            background-color: #EEEDED;
        }
        .text-mobil{
            font-size: 50px;
        }
        .content-2{
            margin-top: 150px;
        }
        .logo-perusahaan{
            position: relative;
            width: 100px;
            height: 100px;
        }
        .img-about{
            width: 600px;
        }
        .dv-3 {
            margin-top: 100px;
        }
        .dv-2 {
            margin-top: 100px;
        }
        .dv-4{
            height: 500px;
            margin-top: 100px;
        }
        .dv-4-txt {
            margin-top: 200px;
        }
        .crd{
            width: 300px;
            height: 350px;
        }
        .dv-5{
            margin-top: 70px;

        }
        .ccrd{
            width: 92%;
            height: 10px;
        }
        .ss{
            position: relative;
            margin: 0 auto;
        }
        .btt{
            border-bottom: 1px solid #000000; 
            
        }
        .btnn:hover{
            background-color: rgb(50, 92, 206);
            color: white;
        }
        .dv-6
        {
            margin-top: 340px;
        }
        @media only screen and (min-width: 600px) and (max-768px){

         }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light navbar-light py-3 container-fluid  col-12 fixed-top">
                <div class="navbar-brand mb-0 col-4 logo-rent text-center ">
                    <h3><b >Echo trans</b></h3>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse text-capitalize col-5" id="navbarNav">
                <ul class="navbar-nav  col-12">
                    <li class="nav-item active ">
                        <a href="#" class="nav-link " role="button" data-bs-toggle="dropdown" aria-expanded="false">tentang</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">pelayanan</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">koleksi</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">pesanan</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">contact</a>
                    </li>
                    <li class="nav-item active col-6">

                        <li class="nav-item dropdown">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('create_mobil') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('create_mobil1').submit();">
                                    {{ __('Create mobil') }}
                                </a>
                                <form id="create_mobil1" action="{{ route('create_mobil') }}" method="get" class="d-none">
                                    
                                </form>
                                
                                <a class="dropdown-item" href="{{route('admin_sewa')}}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('admin_sewa1').submit();">
                                    {{ __('Admin sewa') }}
                                </a>

                                <form id="admin_sewa1" action="{{route('admin_sewa')}}" method="GET" class="d-none">
                                    @csrf
                                </form>
                                    @endif
         
                                <a class="dropdown-item" href="{{ route('pesanan_waiting') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('waiting1').submit();">
                                    {{ __('Pesanan saya') }}
                                </a>

                                <form id="waiting1" action="{{ route('pesanan_waiting') }}" method="GET" class="d-none">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        
                    </li>                
                </ul>
            </div>
        </nav>
        <div class="container-fluid content-2">
            <div class="row justify-content-around">
                <img src="storage/img/mobilheader.png" alt="" class="  col-sm img-fluid img-text ">
                <div class="content  col-sm">
                    <h1 class="ms-5 ms-5 text-mobil"><b>Search and find <br>your best car rental <br>with easy way</b></h1>
                    <p class="offset-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo recusandae quidem accusantium esse inventore nostrum, ad cupiditate sunt quo earum, maxime voluptatem possimus quibusdam expedita adipisci at velit deleniti? Dolorum.</p>
                    <button class="btn bg-primary text-white px-4 py-2 offset-1">Boking now</button>
                    <button class="btn btn-outline-primary">See all cars</button>
                </div>
            </div>
        </div>
        <div class="container dv-2 ">
            <div class="row justify-content-center">
                <div class="col-2  ">
                    <div class="bg-secondary rounded logo-perusahaan"></div>
                </div>
                <div class="col-2  ">
                    <div class="bg-secondary rounded logo-perusahaan"></div>
                </div>
                <div class="col-2  ">
                    <div class="bg-secondary rounded logo-perusahaan"></div>
                </div>
                <div class="col-2  ">
                    <div class="bg-secondary rounded logo-perusahaan"></div>
                </div>
                <div class="col-2  ">
                    <div class="bg-secondary rounded logo-perusahaan"></div>
                </div>
                <div class="col-2  ">
                    <div class="bg-secondary rounded logo-perusahaan"></div>
                </div>
            </div>
        </div>
        <div class="container dv-3 position-relative ">
            <div class="row justify-content-md-around justify-content-sm-around">
                <img src="storage/img/rental_mobil.png" alt="" class="col-6 img-fluid img-about" >
                <div class="col-md-6 mx-4 mt-md-4 mt-sm-4 img-head">
                    <p class="text-capitalize text-primary ">
                        <b>about us</b>
                    </p>
                    <h1 class="my-2">
                        <b>
                        More than 150+ special collection cars
                        </b>
                    </h1>
                    <p class="my-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id adipisci itaque, doloremque voluptate ullam natus qui totam. Quos, error illo maxime delectus sequi itaque! Commodi minus magni in quod. Culpa quasi in architecto officia enim, corrupti, blanditiis, ab nam sunt eveniet repellat maxime consequatur adipisci pariatur ipsa nemo! Quo, facilis beatae. Nihil unde natus sint voluptatem incidunt eligendi aut? Voluptates, excepturi, fugit beatae fugiat labore voluptatum tenetur, at repellendus voluptas aut nobis dicta. Quod itaque cumque optio provident voluptatum laborum quis vel vitae, in odio enim porro. Minus, delectus ad necessitatibus quis esse corporis culpa nemo magnam illo ullam quas!
                    </p>
                    <button class="btn btn-primary px-4 px-3">
                        See all cars ->
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark dv-4 ">
            <div class="row dv-4-txt text-center">
                <h5 class="text-primary mt-5">
                    Our Service
                </h5>
                <h1 class="text-white my-2">Kami memiliki layanan terbaik<br>untuk sewa mobil</h1>
                <p class="text-white-50 my-4">Lorem ipsum dolor sit amet consectetu radipisicing elit. Excepturi cum quas unde <br>  numquam voluptatibus? Qui esse fugiat id placeat dolorum autem <br> laboriosam in quo commodi, maxime voluptate <br> recusandae doloribus?</p>
            </div>
            <div class="container dv-5  position-absolute">
                <div class="row justify-content-around">
                    <div class="card crd bg-white shadow-lg border-none  col-4  offset-2">
                        <div class=" bg-primary ccrd " ></div>
                        <div class="bg-secondary rounded logo-perusahaan ms-4 mt-4"></div>
                        <div class="card-body">
                            <h3 class="text-capitalize text-black-70  mt-4">
                                <b>Kualitas terjaga</b>
                            </h3>
                            <div class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, quia.</div>
                        </div>
                    </div>
                    <div class="card crd bg-white shadow-lg border-none  col-4 ">
                        <div class=" bg-primary ccrd " ></div>
                        <div class="bg-secondary rounded logo-perusahaan ms-4 mt-4"></div>
                        <div class="card-body">
                            <h3 class="text-capitalize text-black-70  mt-4">
                                <b>Mobil terbaik</b>
                            </h3>
                            <div class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, quia.</div>
                        </div>
                    </div>
                    <div class="card crd bg-white shadow-lg border-none col-4  mb-5">
                        <div class=" bg-primary ccrd " ></div>
                        <div class="bg-secondary rounded logo-perusahaan ms-4 mt-4"></div>
                        <div class="card-body">
                            <h3 class="text-capitalize text-black-70  mt-4">
                                <b>Pelayanan Ramah</b>
                            </h3>
                            <div class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, quia.</div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
            <div class="container dv-6">
                <h5 class="text-capitalize text-primary text-center ">collection</h5>
                <h1 class="text-black text-capitalize text-center mt-3"><b>our collection cars</b></h1>
                <div class="row text-capitalize mb-5">
                    <button class="btn btn-light btt col-3 text-capitalize rounded">poppuler</button>
                    <button class="btn btn-light btt col-3 text-capitalize rounded">loking car</button>
                    <button class="btn btn-light btt col-3 text-capitalize rounded">smal car</button>
                    <button class="btn btn-light btt col-3 text-capitalize rounded">exclusice car</button>
                </div>
                <div class="row justify-content-around">
                    
                    
                    @foreach($siswas as $mobil)
                    @if($mobil->kondisi == "disewakan")
                    <div class="card bg-white border-none card-mobil col-3 mb-3 my-4   shadow">
                        <div class="container">
                            <img src="storage/{{$mobil->path}}" alt="" class="img-fluid mt-3 rounded  ">
                            <div class="row mt-4">
                                    <div class="h3 fw-bold text-black-80 col-7"><span class="text-warning">$</span>5,1 <span class="text-black-50">/days</span></div>
                                    <p class="text-secondary text-capitalize col-5 text-end fw-bold mt-2">warna : {{$mobil->warna}}</p>
                                </div>
                            <div class="h5 fw-bold mt-3 text-capitalize">{{$mobil->merek}}</div>
                                <form action="{{route('sewa', $mobil->id)}}" method="get">
                                    <button class="btn btn-light btnn shadow mt-4 h3 fw-bold text-capitalize ms-4" style="width: 200px; ">
                                    Booking now
                                     </button>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endforeach
                <div class="row">
                    <button class="btn btn-primary my-5 text-capitalize text-center mx-auto" style="width: 200px; " >see all cars -></button>
                </div>
            </div> 
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="container-fluid bg-primary mx-auto position-absolute" style="height: 300px; width: 90%;">
                        <div class="row">
                            <div class="h1 text-center text-white fw-bold mt-5">
                                Let's drive with Renty today!
                            </div>
                        </div>
                        <div class="row">
                            <p class="text-white text-center mt-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit <br> Voluptas porro quam quas molestias delectus? Quae, id .
                            </p>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-dark rounded-5 col-4 mx-2" style="width: 250px; height: 75px; border-radius:10px;">
                                    <p class="text-white mt-0">Download on the <br><span class="h4">App Store</span></p>
                            </button>
                            <button class="btn btn-dark rounded-5 col-4 mx-2" style="width: 250px; height: 75px; border-radius:10px;">
                                    <p class="text-white mt-0">Download on the <br><span class="h4">App Store</span></p>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="bg-dark" style="height: 200px;width:100%;margin-top: 200px;" ></div>
                </div>
        
            </div>
</body>
</html>
