<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIGPIB | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/adminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/adminLTE/plugins/toastr/toastr.min.css">
    {{-- Logo --}}
    <link rel="shortcut icon" href="{{ asset('/images/gpib/Logo-GPIB.png') }}">
</head>
<!--
    `body` tag options:

    Apply one or more of the following classes to to the body tag
    to get the desired effect

    * sidebar-collapse
    * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                        <i class="far fa-user"></i>&nbsp; {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{route('profile.tampil_profile') }}" class="dropdown-item">

                            <div class="media">
                                @if (Auth::user()->gambar)
                                <img src="{{ asset('storage/images/pengguna/'.Auth::user()->gambar) }}" class="img-size-50 mr-3 img-circle" alt="Gambar Pengguna">
                                @elseif(Auth::user()->gambar == null)
                                <img src="{{ asset('images/pengguna/default.png') }}" class="img-size-50 mr-3 img-circle" alt="Gambar Pengguna">
                                @endif
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{Auth::user()->name}}
                                    </h3>
                                    <p class="text-sm">{{Auth::user()->username}}</p>
                                    <p class="text-sm text-muted">{{Auth::user()->email}}</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Log Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('dashboard')}}" class="brand-link">
                <img src="{{ asset('/images/gpib/Logo-GPIB.png') }}" alt="Logo GPIB" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">SIGPIB</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth::user()->gambar)
                        <img src="{{ asset('storage/images/pengguna/'.Auth::user()->gambar) }}" class="img-circle elevation-2" alt="Gambar Pengguna">
                        @elseif(Auth::user()->gambar == null)
                        <img src="{{ asset('images/pengguna/default.png') }}" class="img-circle elevation-2" alt="Gambar Pengguna">
                        @endif
                    </div>
                    <div class="info">
                        <a href="{{route('profile.tampil_profile')}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                @section('sidebar')
                @include('layouts.sidebar',['user' => Auth::User()])
                @show
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <!-- breadcrumb -->
                        @yield('breadcrumb')
                        <!-- breadcrumb -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{date('Y')}} <a href="#">GPIB MARANATHA TANJUNG SELOR</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.1.0 -->
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/adminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/adminLTE/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="/adminLTE/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="/adminLTE/dist/js/demo.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/adminLTE/dist/js/pages/dashboard3.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="/adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 -->
    <script src="/adminLTE/plugins/select2/js/select2.full.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
    @include('sweetalert::alert')

    {{-- Custom file --}}
    <script src="/adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- Toastr -->
    <script src="/adminLTE/plugins/toastr/toastr.min.js"></script>

    <!-- Page specific script -->
    <script>

        // Deklrasi CSRF TOKEN
        $(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })
        });

        // DataTable JS
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        // Select2
        $(function () {
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        // Custom file
        $(function () {
            bsCustomFileInput.init();
        });

        // Input hanya angka
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
        }

        // Upload image with preview
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }


    </script>

</body>
</html>
