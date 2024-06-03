@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('Judul_Tab')</title>
    <link rel="icon" href="{{ asset('images/logo/logo.png') }}" type="image/icon type">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css')  }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css') }}">
    {{-- Data Tables --}}
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    {{-- bootstrap --}}
    @vite('resources/css/app.css')
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-users"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-flex align-items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin') }}">
                <div class="brand-link bg-primary">
                    <img src="{{ asset('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text">Admin Desa Wisata</span>
                </div>
            </a>

            <!-- Sideabar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Profil Desa Wisata</li>
                        <li class="nav-item">
                            <a href="{{ route('admin.profil') }}" class="nav-link {{ request()->routeIs('admin.profil') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                            <path fill="currentColor" d="M20 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-3 12H7a1 1 0 1 0 0 2h10a1 1 0 1 0 0-2m-7-8H8a2 2 0 0 0-1.995 1.85L6 9v2a2 2 0 0 0 1.85 1.995L8 13h2a2 2 0 0 0 1.995-1.85L12 11V9a2 2 0 0 0-1.85-1.995zm7 4h-3a1 1 0 0 0-.117 1.993L14 13h3a1 1 0 0 0 .117-1.993zm-7-2v2H8V9zm7-2h-3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2" />
                                        </g>
                                    </svg>
                                    <p>Profil Desa Wisata</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-header">Objek Wisata</li>
                        <li class="nav-item">
                            <a href="{{ route('AdminDestinationView') }}" class="nav-link {{ request()->routeIs('AdminDestinationView') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15">
                                        <path fill="currentColor" d="M6 2c-.554 0-.752.505-1 1l-.5 1h-2C1.669 4 1 4.669 1 5.5v5c0 .831.669 1.5 1.5 1.5h10c.831 0 1.5-.669 1.5-1.5v-5c0-.831-.669-1.5-1.5-1.5h-2L10 3c-.25-.5-.446-1-1-1zM2.5 5a.5.5 0 1 1 0 1a.5.5 0 0 1 0-1m5 0a3 3 0 1 1 0 6a3 3 0 0 1 0-6m0 1.5a1.5 1.5 0 0 0 0 3a1.5 1.5 0 0 0 0-3" /></svg>
                                    <p>Objek Wisata</p>
                                </div>

                            </a>
                        </li>
                        <li class="nav-header">Berita Wisata</li>
                        <li class="nav-item">
                            <a href="{{ route('berita-wisata.index') }}" class="nav-link {{ request()->routeIs('berita-wisata.index') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M4 21q-.825 0-1.412-.587T2 19V3l1.675 1.675L5.325 3L7 4.675L8.675 3l1.65 1.675L12 3l1.675 1.675L15.325 3L17 4.675L18.675 3l1.65 1.675L22 3v16q0 .825-.587 1.413T20 21zm0-2h7v-6H4zm9 0h7v-2h-7zm0-4h7v-2h-7zm-9-4h16V8H4z" /></svg>
                                    <p>Berita Wisata</p>
                                </div>

                            </a>
                        </li>
                        <li class="nav-header">Atraksi Wisata</li>
                        <li class="nav-item">
                            <a href="{{ route('atraksi-wisata.index') }}" class="nav-link {{ request()->routeIs('atraksi-wisata.index') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m6.87 20.627l.863-1.946q-.427-.294-.82-.615q-.392-.32-.75-.716q-.161.075-.339.113q-.178.037-.345.037q-.71 0-1.22-.51q-.511-.511-.511-1.22q0-.404.184-.769t.5-.601q-.2-.575-.293-1.162T4.044 12t.095-1.237t.294-1.163q-.317-.237-.501-.601t-.184-.768q0-.71.51-1.22q.511-.511 1.22-.511q.168 0 .346.038q.178.037.34.112q.825-.9 1.868-1.51t2.243-.89q.087-.635.591-1.077q.505-.442 1.14-.442t1.14.426t.59 1.055q1.239.28 2.282.887T17.887 6.6q.161-.075.317-.093t.317-.018q.71 0 1.22.51q.511.51.511 1.22q0 .404-.18.763t-.493.595q.2.58.294 1.177q.094.596.094 1.246t-.094 1.263t-.294 1.187q.292.237.463.576q.172.34.172.743q0 .71-.511 1.22q-.51.511-1.22.511q-.162 0-.318-.028t-.317-.083q-.358.396-.728.722t-.841.62l.832 1.902q.104.233-.033.434q-.137.202-.395.202q-.14 0-.254-.073t-.175-.202l-.783-1.81q-.427.208-.848.35q-.421.141-.887.255q-.086.628-.59 1.054t-1.14.426t-1.14-.442t-.591-1.077q-.471-.113-.895-.255q-.424-.141-.851-.349L7.708 21q-.062.129-.178.199t-.251.07q-.258 0-.386-.204q-.127-.205-.024-.438m1.183-2.746l1.973-4.385q-.254-.315-.387-.692q-.132-.377-.132-.804q0-1.021.74-1.76q.739-.74 1.76-.74t1.76.74t.74 1.76q0 .427-.155.82t-.414.726l1.973 4.373q.34-.219.649-.478q.308-.258.585-.58q-.202-.219-.297-.495q-.095-.275-.095-.597q0-.8.637-1.327q.636-.526 1.378-.365q.15-.5.245-1.007t.094-1.07t-.094-1.076t-.245-1.012q-.742.161-1.36-.366q-.616-.527-.616-1.327q0-.282.11-.553q.11-.27.282-.489q-.725-.783-1.63-1.292q-.903-.51-1.936-.785q-.178.483-.613.788q-.435.304-.998.304t-.998-.304t-.614-.788q-1.044.275-1.948.788q-.904.512-1.629 1.3q.172.22.282.49t.11.553q0 .819-.63 1.324t-1.373.368q-.15.5-.225 1.007T4.906 12t.075 1.07t.225 1.007q.704-.161 1.354.356t.65 1.336q0 .321-.095.572q-.096.251-.298.47q.277.322.586.567t.649.503m.808.465q.352.183.735.312q.384.128.8.242q.178-.483.613-.788q.434-.304.998-.304t.998.304q.435.305.613.788q.396-.114.765-.223q.368-.11.72-.293l-1.873-4.211q-.281.144-.577.236q-.296.091-.646.091q-.356 0-.674-.094t-.6-.283zm3.146-4.846q.6 0 1.05-.425t.45-1.075q0-.6-.45-1.05t-1.05-.45q-.65 0-1.075.45T10.506 12q0 .65.425 1.075t1.075.425m0-1.5" /></svg>
                                    <p>Atraksi Wisata</p>
                                </div>

                            </a>
                        </li>
                        <li class="nav-header">Paket Wisata</li>
                        <li class="nav-item">
                            <a href="{{ route('admin.paketWisata.index') }}" class="nav-link {{ request()->routeIs('admin.paketWisata.index') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                        <g fill="none">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M9 23h30v11a2 2 0 0 1-2 2H11a2 2 0 0 1-2-2zM9 8a2 2 0 0 1 2-2h26a2 2 0 0 1 2 2v15H9z" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 42a3 3 0 0 1-3-3v-3h6v3a3 3 0 0 1-3 3m18 0a3 3 0 0 1-3-3v-3h6v3a3 3 0 0 1-3 3" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="M6 12v4m36-4v4" />
                                            <circle cx="15" cy="30" r="2" fill="currentColor" />
                                            <circle cx="33" cy="30" r="2" fill="currentColor" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="m31 6l-9 10m16-9l-5 6" />
                                        </g>
                                    </svg>
                                    <p>Paket Wisata</p>
                                </div>

                            </a>
                        </li>
                        <li class="nav-header">Fasilitas</li>
                        <li class="nav-item has-treeview {{ request()->is('admin/penginapan*') || request()->is('fasilitas-kesehatan*') || request()->is('admin/rumahMakan*') || request()->is('admin/bank*') || request()->is('admin/rumahIbadah*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/penginapan*') || request()->is('fasilitas-kesehatan*') || request()->is('admin/rumahMakan*') || request()->is('admin/bank*') || request()->is('admin/rumahIbadah*') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd" d="M11.948 1.25h.104c.899 0 1.648 0 2.242.08c.628.084 1.195.27 1.65.725c.456.456.642 1.023.726 1.65c.06.44.075.964.079 1.57c.648.021 1.226.06 1.74.128c1.172.158 2.121.49 2.87 1.238c.748.749 1.08 1.698 1.238 2.87c.153 1.14.153 2.595.153 4.433v.112c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.944c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433v-.112c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238a17.54 17.54 0 0 1 1.74-.128c.004-.606.02-1.13.079-1.57c.084-.627.27-1.194.725-1.65c.456-.455 1.023-.64 1.65-.725c.595-.08 1.345-.08 2.243-.08M8.752 5.252c.378-.002.775-.002 1.192-.002h4.112c.417 0 .814 0 1.192.002c-.004-.57-.018-1-.064-1.347c-.063-.461-.17-.659-.3-.789c-.13-.13-.328-.237-.79-.3c-.482-.064-1.13-.066-2.094-.066s-1.612.002-2.095.067c-.461.062-.659.169-.789.3c-.13.13-.237.327-.3.788c-.046.346-.06.776-.064 1.347M5.25 6.966c-.73.147-1.194.382-1.548.736c-.423.423-.677 1.003-.812 2.009c-.138 1.027-.14 2.382-.14 4.289c0 1.907.002 3.262.14 4.29c.135 1.005.389 1.585.812 2.008c.354.354.817.59 1.548.736v-2.326a1.195 1.195 0 0 1-.634-.324a1.239 1.239 0 0 1-.341-.735c-.025-.188-.025-.41-.025-.615v-1.068c0-.206 0-.427.025-.615c.03-.219.105-.5.341-.735c.2-.2.434-.285.634-.324zm1.5-.168v7.452h3.284c.206 0 .427 0 .615.025c.219.03.5.105.735.341c.236.236.311.516.341.735c.025.188.025.41.025.615v1.068c0 .206 0 .427-.025.615c-.03.219-.105.5-.341.735a1.239 1.239 0 0 1-.735.341a4.845 4.845 0 0 1-.615.025H6.75v2.452c.867.047 1.925.048 3.25.048h4c1.325 0 2.383 0 3.25-.048V6.798c-.867-.047-1.925-.048-3.25-.048h-4c-1.325 0-2.383 0-3.25.048m12 .168v14.068c.73-.147 1.194-.382 1.548-.736c.423-.423.677-1.003.812-2.009c.138-1.027.14-2.382.14-4.289c0-1.907-.002-3.261-.14-4.29c-.135-1.005-.389-1.585-.812-2.008c-.354-.354-.817-.59-1.548-.736M5.751 15.75L5.75 16v1l.001.249l.249.001h4l.249-.001l.001-.249v-1l-.001-.249L10 15.75H6z" clip-rule="evenodd" /></svg>
                                    <p>Fasilitas</p>
                                    <p class="ml-auto"><i class="fas fa-angle-left right"></i></p>
                                </div>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.penginapan.index') }}" class="nav-link {{ request()->routeIs('admin.penginapan.index') ? 'active' : '' }}">
                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="currentColor" fill-rule="evenodd" d="M16.25 3.75v1.69l2 1.6V3.75zm3.5 4.49V3.5c0-.69-.56-1.25-1.25-1.25H16c-.69 0-1.25.56-1.25 1.25v.74l-.407-.326a3.75 3.75 0 0 0-4.686 0l-8.125 6.5a.75.75 0 0 0 .937 1.172l.781-.626v10.29H2a.75.75 0 0 0 0 1.5h20a.75.75 0 0 0 0-1.5h-1.25V10.96l.782.626a.75.75 0 0 0 .936-1.172zm-.5 1.52l-5.844-4.675a2.25 2.25 0 0 0-2.812 0L4.75 9.76v11.49h3.5v-4.3c0-.664 0-1.237.062-1.696c.066-.492.215-.963.597-1.345s.854-.531 1.345-.597c.459-.062 1.032-.062 1.697-.062h.098c.665 0 1.238 0 1.697.062c.492.066.963.215 1.345.597s.531.853.597 1.345c.062.459.062 1.032.062 1.697v4.299h3.5zm-5 11.49V17c0-.728-.002-1.2-.048-1.546c-.044-.325-.114-.427-.172-.484c-.057-.057-.159-.128-.484-.172c-.347-.046-.818-.048-1.546-.048c-.728 0-1.2.002-1.546.048c-.325.044-.427.115-.484.172c-.057.057-.128.159-.172.484c-.046.347-.048.818-.048 1.546v4.25zM12 8.25a1.25 1.25 0 1 0 0 2.5a1.25 1.25 0 0 0 0-2.5M9.25 9.5a2.75 2.75 0 1 1 5.5 0a2.75 2.75 0 0 1-5.5 0" clip-rule="evenodd" /></svg>
                                            <p>Penginapan</p>
                                        </div>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fasilitas-kesehatan.index') }}" class="nav-link {{ request()->routeIs('fasilitas-kesehatan.index') ? 'active' : '' }}">

                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                                                <path fill="currentColor" d="M248 208h-8v-80a16 16 0 0 0-16-16h-56V48a16 16 0 0 0-16-16H56a16 16 0 0 0-16 16v160h-8a8 8 0 0 0 0 16h216a8 8 0 0 0 0-16m-24-80v80h-56v-80ZM56 48h96v160h-16v-48a8 8 0 0 0-8-8H80a8 8 0 0 0-8 8v48H56Zm64 160H88v-40h32ZM72 96a8 8 0 0 1 8-8h16V72a8 8 0 0 1 16 0v16h16a8 8 0 0 1 0 16h-16v16a8 8 0 0 1-16 0v-16H80a8 8 0 0 1-8-8" /></svg>
                                            <p>Fasilitas Kesehatan</p>
                                        </div>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.rumahMakan.index') }}" class="nav-link {{ request()->routeIs('admin.rumahMakan.index') ? 'active' : '' }}">
                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15">
                                                <path fill="currentColor" d="m3.5 0l-1 5.5c-.146.805 1.782 1.181 1.75 2L4 14c-.038 1 1 1 1 1s1.038 0 1-1l-.25-6.5c-.031-.818 1.733-1.18 1.75-2L6.5 0H6l.25 4l-.75.5L5.25 0h-.5L4.5 4.5L3.75 4L4 0zM12 0c-.736 0-1.964.655-2.455 1.637C9.135 2.373 9 4.018 9 5v2.5c0 .818 1.09 1 1.5 1L10 14c-.09.996 1 1 1 1s1 0 1-1z" /></svg>
                                            <p>Rumah Makan</p>
                                        </div>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.bank.index') }}" class="nav-link {{ request()->routeIs('admin.bank.index') ? 'active' : '' }}">
                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 18.75a60 60 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0a3 3 0 0 1 6 0m3 0h.008v.008H18zm-12 0h.008v.008H6z" /></svg>
                                            <p>Bank</p>
                                        </div>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.rumahIbadah.index') }}" class="nav-link {{ request()->routeIs('admin.rumahIbadah.index') ? 'active' : '' }}">
                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                    <path d="M12 2v4m2-2h-4M8.501 8.799L12 6l3.499 2.799C16.717 9.774 17 10.362 17 11.923V22H7V11.923c0-1.56.283-2.15 1.501-3.124M17 12l1.789.894c1.076.538 1.614.807 1.912 1.29c.299.484.299 1.085.299 2.288V20c0 .943 0 1.414-.293 1.707S19.943 22 19 22h-2M7 12l-1.789.894c-1.076.538-1.614.807-1.912 1.29C3 14.669 3 15.27 3 16.473V20c0 .943 0 1.414.293 1.707S4.057 22 5 22h2" />
                                                    <path d="M10 22v-4a2 2 0 1 1 4 0v4m-1.992-11h-.009" />
                                                </g>
                                            </svg>
                                            <p>Rumah Ibadah</p>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Produk UMKM</li>
                        <li class="nav-item has-treeview {{ request()->is('admin/umkm/makanan*') || request()->is('admin/umkm/sovenir*') || request()->is('admin/umkm/pakaian*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/umkm/makanan*') || request()->is('admin/umkm/sovenir*') || request()->is('admin/umkm/pakaian*') ? 'active' : '' }}">
                                <div class="flex">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                                        <circle cx="10" cy="28" r="2" fill="currentColor" />
                                        <circle cx="24" cy="28" r="2" fill="currentColor" />
                                        <path fill="currentColor" d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7m-2.8 9H7.62l-1.4-7h20.53Z" /></svg>
                                    <p>Produk Umkm</p>
                                    <p class="ml-auto"><i class="fas fa-angle-left right"></i></p>
                                </div>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.umkm.makanan.index') }}" class="nav-link {{ request()->routeIs('admin.umkm.makanan.index') ? 'active' : '' }}">
                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M21.9 5H18V2c0-.55-.45-1-1-1s-1 .45-1 1v3h-3.9c-.59 0-1.05.51-1 1.1l.12 1.21C14.9 8.16 18 10.77 18 15l.02 8h1.7c.84 0 1.53-.65 1.63-1.47L22.89 6.1c.06-.59-.4-1.1-.99-1.1M15 21H2c-.55 0-1 .45-1 1s.45 1 1 1h13c.55 0 1-.45 1-1s-.45-1-1-1M2.1 15h12.8c.62 0 1.11-.56.99-1.16c-.65-3.23-4.02-4.85-7.39-4.85s-6.73 1.62-7.39 4.85c-.12.6.38 1.16.99 1.16M15 17H2c-.55 0-1 .45-1 1s.45 1 1 1h13c.55 0 1-.45 1-1s-.45-1-1-1" /></svg>
                                            <p>Makanan</p>
                                        </div>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.umkm.sovenir.index') }}" class="nav-link {{ request()->routeIs('admin.umkm.sovenir.index') ? 'active' : '' }}">
                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M17 32.41L24 29l7 3.41v7.5L24 44l-7-4.09zM8 4c.455 8.333 6 25 16 25S40 12.784 40 4" /></svg>
                                            <p>Souvenir</p>
                                        </div>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.umkm.pakaian.index') }}" class="nav-link {{ request()->routeIs('admin.umkm.pakaian.index') ? 'active' : '' }}">

                                        <div class="flex">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                                                    <path d="M37 17V37M11 37V44H37V37M11 37H4V17C4 14 6 10.5 9 8C12 5.5 16 4 16 4H32C32 4 36 5.5 39 8C42 10.5 44 14 44 17V37H37M11 37V17" />
                                                    <path d="M24 17V44" />
                                                    <path d="M24 17L16 4" />
                                                    <path d="M32 4L24 17" />
                                                </g>
                                            </svg>
                                            <p>Pakaian</p>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <div class="content-wrapper">
            <section class="content">
                {{-- Content --}}
                @yield('Konten')
                {{-- End Content --}}
            </section>
        </div>

        <!-- Main Footer -->
        {{-- <footer class="main-footer d-flex justify-content-center">
    <strong>Copyright ©. <a href="#">04-PA-III-2024</a>. </strong>
    All rights reserved.
    
  </footer> --}}
    </div>

    <!-- REQUIRED SCRIPTS -->
    {{-- Sweet Alert --}}
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/pages/dashboard2.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            Swal.fire({
                title: 'Sukses!'
                , text: "{{ session('success') }}"
                , icon: 'success'
                , confirmButtonText: 'OK'
            });
            @elseif(session('error'))
            Swal.fire({
                title: 'Gagal!'
                , text: "{{ session('error') }}"
                , icon: 'error'
                , confirmButtonText: 'OK'
            });
            @endif
        });

        $(document).ready(function() {
            $('.summernote').summernote();
        });

    </script>

    @yield('js')
    {{-- {!! Alert::render() !!} --}}
</body>
</html>
