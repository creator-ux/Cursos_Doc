<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">   
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>-->
        <<link href="{{ asset('recursos/template/css/styles.css') }}" rel="stylesheet">
        <link href="/recursos/template/css/styles.css" rel="stylesheet">
    </head>
        
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3">TecNM Tizimín</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch">
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                                @auth
                                    @if (Auth::user()->rol == 0)
                                    <div class="sb-sidenav-menu-heading">Core</div>
                                        <a class="nav-link" href="{{ route('dashboard.admin') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Dashboard
                                        </a>
                                    @else
                                        <!-- <a class="nav-link" href="{{ route('dashboard.user') }}">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Dashboard
                                        </a> -->
                                    @endif
                                @endauth
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Curso Docente
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="accordion-header" id="headingOne">
                                <!-- Opcional: un título visible o solo el ID para accesibilidad -->
                            </div>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion"> 
                                    @auth
                                    @if(Auth::user()->rol === 0)
                                            @include('components.admin')
                                        @else
                                            @include('components.user')
                                    @endif
                                    @endauth
                            </div>
                            
                            <div class="sb-sidenav-menu-heading"></div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <main>
                    <!-- Area de registro por parte del usuario -->
                    <div class="container-fluid px-4">
                    <h1 class="mt-4">SUBDIRECCIÓN ACADÉMICA</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">DEPTO. DESARROLLO ACADÉMICO</li>
                        </ol>
                        <img src="/recursos/images/logoTEC.jpg" alt="Logo" style="border-radius: 10px; width: 90px; position: absolute; top: 0; right: 0; margin: 35px;">
                    @yield('content')
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('recursos/template/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('recursos/template/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('recursos/template/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('recursos/template/js/datatables-simple-demo.js') }}"></script>
        <script src="/app/recursos/template/js/datatables-simple-demo.js"></script>
    </body>
</html>