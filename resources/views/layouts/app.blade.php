<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        {{-- datatable --}}
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
        {{-- bootstrap select --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        {{-- jasy input file --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
        {{-- sweetalert2 --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.1/sweetalert2.min.css" integrity="sha512-A374yR9LJTApGsMhH1Mn4e9yh0ngysmlMwt/uKPpudcFwLNDgN3E9S/ZeHcWTbyhb5bVHCtvqWey9DLXB4MmZg==" crossorigin="anonymous" />
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')

    <div class="bg-primary pb-8 pt-5 pt-md-8"></div>
            <div style="margin-top: -150px;"></div>
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        {{-- bootstrap select JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
        {{-- jasy input file JS --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>

        {{-- costume DataTable JS --}}
        <script type="text/javascript">
        $(document).ready(function() {
            $('#residentTable').DataTable( {
                order: [[ 2, 'desc' ], [ 0, 'asc' ]]
            } );
          } );
        </script>

        {{-- sweetalert2 JS--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.1/sweetalert2.min.js" integrity="sha512-EA9r8JpWbDk5D7aCAyCc+BgwgJ1tbGeCTiXnOn+2Dcz2Hlh/IPyzfUzdpx5XngNElAtsAKlfyGUAfF/BgO4kuw==" crossorigin="anonymous"></script>
            <script>
                function deleteItem(id){
                    const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
              })

            swalWithBootstrapButtons.fire({
              title: 'Hapus Data Ini?',
              text: "Data Tidak Dapat Dikembalikan!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes',
              cancelButtonText: 'No',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();

              } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Batal',
                  'Data Tidak Jadi di Hapus ',
                  'error'
                )
              }
            })
                }
            </script>
    </body>
</html>
