<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Toko Giardino</title>
        <link rel="shortcut icon" href="img/toko.jpg">
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="/css/sweetalert2.css"> --}}
        <link rel="stylesheet" href="/css/sweetalert.css">

        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
    
    </head>
    <body>
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Toko Giardino `{{ Auth::user()->name}}`</a>
        </div>
        
    </div>
    <!-- /container -->
</div>
<!-- /Header -->
 <ul class="nav nav-stacked">
               
                        <li class="active"> <a href="{{route('barangs.index')}}"><i class="glyphicon glyphicon-book"></i> Barang </a></li>                        
                        <li><a href="{{route('customers.index')}}"><i class="glyphicon glyphicon-flag"></i> Customer </a></li>
                        <li><a href="{{route('suppliers.index')}}"><i class="glyphicon glyphicon-flag"></i> Supplier </a></li>
                        <li><a href="{{route('transaksipembelians.index')}}"><i class="glyphicon glyphicon-flag"></i> Transaksi Pembelian </a></li>
                        <li><a href="{{route('transaksipenjualans.index')}}"><i class="glyphicon glyphicon-flag"></i> Transaksi Penjualan </a></li>
                        
                         <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-off"></i></i> Logout</a>
        </li>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel
            <li>
                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal"> Logout </button>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                         </form>
                        </li>
                    </ul>

          </div>
        </div>
      </div>
    </div>
                       
<!-- Main -->

<!-- /Main -->

@yield('content')
<!-- /.modal -->
    <!-- script references -->
    
        <script src="/js/app.js"></script>
         
        {{-- <script src="/js/bootstrap.min.js"></script> --}}
        {{-- <script src="/js/scripts.js"></script> --}}
        <script src="/js/sweetalert.min.js"></script>
        {{-- <script src="/js/sweetalert2.min.js"></script> --}}
        <script type="text/javascript">
    $(document).on('click', '#delete-btn', function(e){
        e.preventDefault();
        var self = $(this);
        swal({
                    title: "Are You Sure?",
                    text: "This data will be deleted and will not be back!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        swal("Terhapus !","Data terhapus", "success");
                        setTimeout(function() {
                            self.parents(".delete").submit();
                        }, 100);
                    }
                    else{
                        swal("Batal","Tidak jadi menghapus", "error");
                    }
                });

    });
</script>
        @include('sweet::alert')
        
        @stack('scripts')

       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" sr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
        

    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );   
    </script>
    
    </body>
</html>