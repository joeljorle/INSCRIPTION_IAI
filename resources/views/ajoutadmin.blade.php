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
        <div class="pull-left info">
          <span>{{Auth::user()->name}}</span>
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
              <li class="active"><a href="classes.html"><i class="fa fa-dashboard"></i>acceuill</a></li>
              <li><a href="classes.html"><i class="fa fa-users"></i>Administrateurs</a></li>
              <li><a href="classes.html"><i class="fa fa-institution"></i>filieres</a></li> 
              <li><a href="classes.html"><i class="fa fa-institution"></i>classes</a></li>

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
                <li class="active"><a href="classes.html"><i class="fa fa-dashboard"></i>paiements</a></li>
                <li><a href="classes.html"><i class="fa fa-square-o"></i>Unite de paiements</a></li>
                <li><a href="classes.html"><i class="fa fa-square-o"></i>moratoire et penalite</a></li> 
                <li><a href="classes.html"><i class="fa fa-square-o"></i>paiements a distances</a></li>
  
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
          AJOUT D'ADMINISTRATEUR
            <small></small>
          </h1>
          
        </section>




          <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group" >
                    <label for="admininom">nom</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="adminnom" placeholder="Entrer un nom" value="{{ old('name') }}"  autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>

                <div class="form-group" >
                    <label for="adminiprenom">prenom</label>
                    <input type="text" name="surname" class="form-control  @error('surname') is-invalid @enderror" id="adminprenom" placeholder="Entrer un prenom" value="{{ old('surname') }}"  autocomplete="surname" autofocus>

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


              <div class="form-group">
                <label for="email">Addresse Email</label>

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Entrer votre adresse email" value="{{ old('email') }}"  autocomplete="email">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="password">mot de pass</label>

                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrer votre mot de pass" name="password"  autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror

              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Confirmation</label>
                  <input id="password-confirm" type="password" class="form-control" placeholder="confirmer votre mot de pass" name="password_confirmation"  autocomplete="new-password">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">choisir un image de profil</label>
                <input type="file" id="exampleInputFile" name="image">
                  @error('image')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label>privilleges</label>
                  <div class="checkbox">
                      <label>
                        <input type="checkbox" selected="true">
                       TOUS
                      </label>
                    </div>

                    <div class="checkbox">
                        <label>
                          <input type="checkbox" selected="true">
                         GESTION DE COMPTES
                        </label>
                      </div>
                      <div class="checkbox">
                          <label>
                            <input type="checkbox" selected="true">
                            GESTION DE CLASSES ET FILIERES
                          </label>
                        </div>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" selected="true">
                              GESTION DE PENALITES
                            </label>
                          </div>
                          <div class="checkbox">
                              <label>
                                <input type="checkbox" selected="true">
                                GESTION DE MORATOIRE
                              </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" selected="true">
                                  GESTION DE PAIEMENTS
                                </label>
                              </div>
                              <div class="checkbox">
                                  <label>
                                    <input type="checkbox" selected="true">
                                    GESTION DES UNITES DE PAIEMENT
                                  </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox" selected="true">
                                      GESTION DE PENSION GENERAL
                                    </label>
                                  </div>
                </div>

            </div>
            <!-- /.box-body -->
    
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">crer</button>
            </div>
          </form>
    




    </div>
    <!-- /.col -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <span href="https://adminlte.io">INSCRIPTION IAI</span>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
</body>
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
