<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
      #dropdownToggle{
        display: fixed;
      }
      .text-head{
          font-size: 30px;
      }
      .nav-pills li a:hover{
          background-color: rgba(96, 96, 96, 0.199);
      }
      .aa{
          height:70vh;
      }
    </style>
</head>

    <style>
    </style>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
        <div class="d-flex flex-column justify-content-between col-auto bg-dark min-vh-100 ">
            <div class="sidebar">
                <a href="" class="text-white text-decoration-none d-flex mt-2 align-items-center fw-bold mt-3 px-2 " role="button">
                    <span class="text-head">Sidemenu</span>
                </a>
                <hr class="text-white">
                <ul class="nav nav-pills flex-column mt-2" id="menu">
                    <li class="nav-item my-2">
                        <a href="#" class="nav-link text-white btnn_1" aria-current="page">
                            <span class="fs-5 ">Dashbaord</span>
                        </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="#" class="nav-link text-white btnn_1" aria-current="page">
                            <span class="fs-5 ">Home</span>
                        </a>
                    </li>
                    <li class="nav-item disabled  my-2">
                        <a href="#sidemenu" data-bs-toggle="collapse" class="nav-link text-white" aria-current="page">
                            <span class="fs-5 ">lanjut</span>
                        </a>
                        <ul class="collapse ms-1 " id="sidemenu" data-bs-parent="#menu">
                            <li class="nav-item">
                                <a href="#" aria-current="page" class="text-white nav-link my-link lanjut">Item 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" aria-current="page" class="text-white nav-link my-link lanjut">Item 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item my-2">
                        <a href="#sidemenu_2" data-bs-toggle="collapse" class="nav-link text-white" aria-current="page">
                            <span class="fs-5 ">Costumers</span>
                        </a>       
                        <ul class="collapse ms-1 " id="sidemenu_2" data-bs-parent="#menu">
                            <li class="nav-item">
                                <a href="#" aria-current="page" class="text-white nav-link my-link lanjut">Item 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" aria-current="page" class="text-white nav-link my-link lanjut">Item 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="dropdown dropup">
                <a href="#" type="button" id="triggerId"   data-bs-toggle="dropdown" data-bs-target="#triggerId" aria-haspopup="true" aria-expanded="false" class="btn border-none outline-none text-white dropdown-toggle">
                    <span>yousaf</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a href="#" class="dropdown-item" >Profile</a>
                    <a href="#" class="dropdown-item">Settings </a>
                </div>
            </div>
            
        </div>
            <div class="container col-10">    
                <div class="row">
                    <div class="col-12">
                        <div class="row">

                            <div class="text-center fw-bold h1 mt-4 ">
                                Akun belum terverifikasi
                            </div>
                        </div>
                        <div class="row  mt-5 aa ">
                            <div class="col ">
                   
                                <div class="row shadow py-2 mt-3 rounded">
                                    <div class="col-6">
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item">An item</li>
                                            <li class="list-group-item">A second item</li>
                                            <li class="list-group-item">A third item</li>
                                          
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary col-3 mx-1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Check</a>
                                        <button type="submit" class="btn btn-success col-3 mx-1 ">Terima</button>
                                        <button type="submit" class="btn btn-danger  col-3 mx-1 ">Tolak</button>
                                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  Show a second modal and hide this one with the button below.
                                                </div>
                                                <div class="modal-footer">
                                                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row shadow py-2 mt-3 rounded">
                                    <div class="col-6">
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item">An item</li>
                                            <li class="list-group-item">A second item</li>
                                            <li class="list-group-item">A third item</li>
                                          
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary col-3 mx-1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Check</a>
                                        <button type="submit" class="btn btn-success col-3 mx-1 ">Terima</button>
                                        <button type="submit" class="btn btn-danger  col-3 mx-1 ">Tolak</button>
                                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  Show a second modal and hide this one with the button below.
                                                </div>
                                                <div class="modal-footer">
                                                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row shadow py-2 mt-3 rounded">
                                    <div class="col-6">
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item">An item</li>
                                            <li class="list-group-item">A second item</li>
                                            <li class="list-group-item">A third item</li>
                                          
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary col-3 mx-1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Check</a>
                                        <button type="submit" class="btn btn-success col-3 mx-1 ">Terima</button>
                                        <button type="submit" class="btn btn-danger  col-3 mx-1 ">Tolak</button>
                                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  Show a second modal and hide this one with the button below.
                                                </div>
                                                <div class="modal-footer">
                                                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 ">

                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                              <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
<script>
        const menuItems = document.querySelectorAll('#menu .nav-link');
        const navlink = document.querySelectorAll('.nav-link');
        const collapseItems = document.querySelectorAll('.collapse');
        const lanjut = document.querySelectorAll('.lanjut');
        const btnn_1 = document.querySelectorAll('.btnn_1');

        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                // Menghapus class 'active' dari semua menu items
                menuItems.forEach(menuItem => {
                    menuItem.classList.remove('active');
                });
                // Menambah class 'active' pada menu item yang diklik
                item.classList.add('active');
                // Menutup semua collapse items
                
                btnn_1.forEach(link => {
                    link.addEventListener('click', event => {
                        if (link.classList.contains('btnn_1')) {
                            collapseItems.forEach(collapseItem => {
                                collapseItem.classList.remove('show');
                            });
            
                        }
                    });
                });

            });
        });
</script>
</html>