<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>{{ config('app.name', 'INSCRIPTION_IAI') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('/public/plugins/iCheck/all.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('/public/plugins/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/public/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/public/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IAI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inscription</b>IAI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('/public/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>

          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/public/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>

      </div>


        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-circle-o"></i> <span>GENERALITES</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>acceuill</a></li>
                    <li><a href="{{route('admin.index')}}"><i class="fa fa-users"></i>administrateurs</a></li>
                    <li><a href="{{route('filieres.index')}}"><i class="fa fa-institution"></i>filieres</a></li>
                    <li><a href="{{route('classes.index')}}"><i class="fa fa-institution"></i>classes</a></li>
                    <li><a href="{{route('etudiants.index')}}"><i class="fa fa-users"></i>etudiants</a></li>

                </ul>
            </li>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-circle-o"></i> <span>INSCRIPTION</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('paiements.index')}}"><i class="fa fa-dashboard"></i>paiements</a></li>
                    <li><a href="{{route('unitepaiements.index')}}"><i class="fa fa-square-o"></i>unites de paiement</a></li>
                    <li><a href="{{route('modelpaiements.index')}}"><i class="fa fa-square-o"></i>models de paiement</a></li>
                    <li><a href="{{route('moratoires.index')}}"><i class="fa fa-square-o"></i>moratoire et penalite</a></li>
                    <li><a href="{{route('paiementdistances.index')}}"><i class="fa fa-square-o"></i>paiements a distances</a></li>

                </ul>
            </li>
        </ul>
        </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <h1>
          NOUVEAU PAIEMENT
            <small>RECU</small>
          </h1>

        </section>


        <div class="box box-info">
            <div class="box-body">
        <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> RECU DE PAIEMENT
                <small class="pull-right">Date: {{$PAIE==null?' ':$PAIE->created_at}}</small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
             de
              <address>
                <strong>IAI-CAMEROUN</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              A
              <address>
                <strong>{{$ETUD->name}}</strong><br>
         classe:{{$ETUD->CLASSE()->name}}<br>
        <i class="fa fa-phone"></i> {{$ETUD->phone}}<br>
        <i class="fa fa-envelope"></i> {{$ETUD->email}}
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>RECU  No: #{{$PAIE==null?$idrecu:$PAIE->idrecu}}</b><br>
              <br>
              <b>VERSEMENT TOTAL (FCFA):</b> {{$PAIE==null?$versement:$PAIE->montant}}<br>
              <label class="label label-success"> repartition</label>
              <br>
                @foreach($REPARTITION as $repart)
               <b>{{$repart['name']}} (FCFA):</b> {{$repart['montant']}}<br>
                   @endforeach
                <br><br>
                <b>Reste a payer (FCFA):</b>{{$PAIE==null?$reste:$ETUD->VERSEMENT_RESTE()}}

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <h5>methode de paiement <label class="label label-success"> {{$PAIE==null?($PDIST==0?'local':$PDIST->name):$PAIE->MODE_PAIEMENT()}}</label></h5>

            </div>

          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">

                @if($test)
                <form class="pull-left" method="post" action="{{route('paiements.store')}}">
                @csrf
                <input type="hidden" name="etudiant" value="{{$ETUD->id}}">
                <input type="hidden" name="montant" value="{{$versement}}">
                <input type="hidden" name="mode" value="{{$mode}}">
                <input type="hidden" name="idrecu" value="{{$idrecu}}">
                    <button type="submit"  class="btn btn-success pull-left"><i class="fa fa-arrow-circle-right"></i> VALIDER LE PAIEMENT</button>
                </form>
                @endif

                    <form class="pull-right" method="get" action="{{route('paiements.print')}}">
                        @csrf
                        <input type="hidden" name="etudiant" value="{{$ETUD->id}}">
                        <input type="hidden" name="montant" value="{{$PAIE==null?$versement:$PAIE->montant}}">
                        <input type="hidden" name="mode" value="{{$PAIE==null?($PDIST==0?'local':$PDIST->name):$PAIE->MODE_PAIEMENT()}}">
                        <input type="hidden" name="idrecu" value="{{$PAIE==null?$idrecu:$PAIE->idrecu}}">
                        @if($PAIE!=null)<input type="hidden" name="paie" value="{{$PAIE->id}}">@endif
                        <button type="print"  class="btn btn-default pull-rigth"><i class="fa fa-arrow-print"></i>IMPRIMER</button>
                    </form>
            </div>
          </div>
            </div>


     </div>






  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <span href="{{route('home')}}">INSCRIPTION IAI</span>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('/public/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/public/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('/public/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('/public/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('/public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/public/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DataTables -->
<script src="{{ asset('/public/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('/public/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('/public/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/public/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/public/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/public/bower_components/fastclick/lib/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('/public/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/public/dist/js/pages/dashboard.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('/public/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/public/dist/js/demo.js') }}"></script>

</body>
</html>
