<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>{{ config('app.name', 'INSCRIPTION_IAI') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/public/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/public/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via UNITe:// -->
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
        <div class="pull-left info">
          <span>{{Auth::user()->name}}</span>
<a class="btn btn-success btn-outline-success" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="fa fa-sign-out">  </i>  <span>logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
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
              <li><a href="{{route('admin.index')}}"><i class="fa fa-users"></i>Administrateurs</a></li>
              <li><a href="{{route('unitepaiements.index')}}"><i class="fa fa-institution"></i>unitepaiements</a></li>
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
              {{$UNIT==null?"AJOUT D'UNE UNITE DE PAIEMENT":"MODIFICATION DE L'UNITE DE PAIEMENT ".$UNIT->name}}
            <small></small>
          </h1>

        </section>
      <form role="form" method="POST" action="{{ $UNIT==null?route('unitepaiements.store'):route('unitepaiements.update',$UNIT)}}" enctype="multipart/form-data">
            @if($UNIT!=null) @method('PATCH') @endif

            @csrf
            <div class="box-body">

                <div class="form-group" >
                    <label for="admininom">nom</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="adminnom" placeholder="Entrer un nom" value="{{ $UNIT==null?old('name'):$UNIT->name }}"  autocomplete="name" autofocus >

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group" >
                    <label for="desc">description</label>
                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="desc" placeholder="Entrer une description" value="{{ $UNIT==null?old('description'):$UNIT->description }}"  autocomplete="description" autofocus>{{ $UNIT==null?old('description'):$UNIT->description }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="box-footer">
              <button type="submit" class="btn btn-primary">{{$UNIT==null?"AJOUTER":"MODIFIER"}}</button>
                </div>
            </div>
          </form>

    </div>
    <!-- /.col -->



    <!-- /.content -->
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
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/public/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
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
