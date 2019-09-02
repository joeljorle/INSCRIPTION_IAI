<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'INSCRIPTION_IAI') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <link rel="stylesheet" href="{{ asset('/public/plugings/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">...</li>
        </ol>
      </section>
  <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

      <div class="row">
          <section class="content-header">
              <h1>
                CHIFFRES
                <small></small>
              </h1>

            </section>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa  fa-institution"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">filieres</span>
              <span class="info-box-number">{{count($FILS)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa  fa-institution"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">classes</span>
              <span class="info-box-number">{{count($CLASS)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa  fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">etudiants</span>
              <span class="info-box-number">{{count($ETUDS)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-check-square-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">solvable</span>
              <span class="info-box-number">{{count($SOLVABLES)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-square-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">insolvable</span>
              <span class="info-box-number">{{count($INSOLVABLES)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">revenus</span>
              <span class="info-box-number">{{$REVENUS}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">reste a payer</span>
              <span class="info-box-number">{{$RESTE}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Administrateurs</span>
              <span class="info-box-number">{{count($ADMINS)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>


      <section class="content-header">
          <h1>
            GENERALITES
            <small></small>
          </h1>

        </section>

        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">statut general</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="col">
              <div class="chart-responsive">
                <canvas id="pieChart" height="100"></canvas>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> Insolvable</li>
                <li><i class="fa fa-circle-o text-green"></i>Solvable</li>
                <li><i class="fa fa-circle-o text-yellow"></i>Moratoire</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.nav-tabs-custom -->

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Quelques Administrateurs</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>IDENTIFIANT</th>
                    <th>NOM ET PRENOM</th>
                    <th>Enregistrer le</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($ADMINS!=null)
                      @foreach($ADMINS as $ADMIN)
                  <tr>
                    <td>{{$ADMIN->slug}}</td>
                    <td>{{$ADMIN->name.'  '.$ADMIN->surname}}</td>
                    <td>{{$ADMIN->created_at}}</td>
                    <td></td>
                  </tr>
                     @endforeach
                   @endif

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
             <!-- /.box-body -->
             <div class="box-footer clearfix">
                <a href="{{route('admin.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-user-plus"></i> Nouvel Administrateur</a>
                 <a href="{{route('admin.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir tous</a>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Quelques etudiants</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>MATRICULE</th>
                <th>NOM ET PRENOM</th>
                <th>classe</th>
                <th>Enregistrer le</th>
              </tr>
              </thead>
              <tbody>

              @if($ETUDS!=null)
                  @foreach($ETUDS as $ETUD)
                      <tr>
                          <td>{{$ETUD->slug}}</td>
                          <td>{{$ETUD->name.'  '.$ETUD->surname}}</td>
                          <td>{{$ETUD->CLASSE()->name}}</td>
                          <td>{{$ETUD->created_at}}</td>
                          <td></td>
                      </tr>
                      @endforeach
                      @endif
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
         <!-- /.box-body -->
         <div class="box-footer clearfix">
            <a href="{{route('etudiants.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-user-plus"></i> Nouvel etudiant</a>
             <a href="{{route('etudiants.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir tous</a>
          </div>
          <!-- /.box-footer -->
      </div>
      <!-- /.box -->


      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Quelques classes</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                <tr>
                  <th>IDENTIFIANT</th>
                  <th>LABEL</th>
                  <th>EFFECTIFS</th>
                  <th>Enregistrer le</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @if($CLASS!=null)
                    @foreach($CLASS as $CLAS)
                        <tr>
                            <td>{{$CLAS->slug}}</td>
                            <td>{{$CLAS->name}}</td>
                            <td>{{$CLAS->EFFECTIF()}}</td>
                            <td>{{$CLAS->created_at}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        @endif
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
           <!-- /.box-body -->
           <div class="box-footer clearfix">
              <a href="{{route('classes.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-plus"></i> Nouvelle classe</a>
              <a href="{{route('classes.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir toutes</a>
            </div>
            <!-- /.box-footer -->
      </div>
        <!-- /.box -->

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Quelques Filieres</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>IDENTIFIANT</th>
                    <th>LABEL</th>
                    <th>CLASSES</th>
                    <th>EFFECTIFS</th>
                    <th>Enregistrer le</th>
                  </tr>
                  </thead>
                  <tbody>

                  @if($FILS!=null)
                      @foreach($FILS as $FIL)
                          <tr>
                              <td>{{$FIL->slug}}</td>
                              <td>{{$FIL->name}}</td>
                              <td>{{$FIL->CLASSES()}}</td>
                              <td>{{$FIL->EFFECTIF()}}</td>
                              <td>{{$FIL->created_at}}</td>
                          </tr>
                      @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
             <!-- /.box-body -->
             <div class="box-footer clearfix">
                <a href="{{route('filieres.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-plus"></i> Nouvelle filiere</a>
                <a href="{{route('filieres.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir toutes</a>
              </div>
              <!-- /.box-footer -->
        </div>
          <!-- /.box -->


          <section class="content-header">
              <h1>
              INSCRIPTIONS
                <small></small>
              </h1>

            </section>



            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Quelques Unites de Paiement</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>IDENTIFIANT</th>
                        <th>LABEL</th>
                        <th>Description</th>
                        <th>Nbre de Paiement</th>
                        <th>total FCFA</th>
                      </tr>
                      </thead>
                      <tbody>


                      @if($UNITS!=null)
                          @foreach($UNITS as $UNIT)
                              <tr>
                                  <td>{{$UNIT->slug}}</td>
                                  <td>{{$UNIT->name}}</td>
                                  <td>{{$UNIT->description}}</td>
                                  <td>{{$UNIT->NBRE_PAIEMENTS()}}</td>
                                  <td>{{$UNIT->created_at}}</td>
                              </tr>
                          @endforeach
                      @endif

                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                 <!-- /.box-body -->
                 <div class="box-footer clearfix">
                    <a href="{{route('unitepaiements.index')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-user-plus"></i> Nouvelle unite</a>
                     <a href="{{route('unitepaiements.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir toutes</a>
                  </div>
                  <!-- /.box-footer -->
              </div>
              <!-- /.box -->

              <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Quelques Unites de Paiement a distance</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>

                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>IDENTIFIANT</th>
                          <th>NOM</th>
                          <th>Description</th>
                          <th>Nbre de Paiement</th>
                          <th>total FCFA</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($PDISTS!=null)
                            @foreach($PDISTS as $PDIST)
                                <tr>
                                    <td>{{$PDIST->slug}}</td>
                                    <td>{{$PDIST->name}}</td>
                                    <td>{{$PDIST->description}}</td>
                                    <td>{{$PDIST->NBRE_PAIEMENTS()}}</td>
                                    <td>{{$PDIST->created_at}}</td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.box-body -->
                   <!-- /.box-body -->
                   <div class="box-footer clearfix">
                       <a href="{{route('paiementdistances.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-user-plus"></i> Nouvelle unite</a>
                       <a href="{{route('paiementdistances.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir toutes</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Quelques Moratoires</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>IDENTIFIANT</th>
                            <th>LABEL</th>
                            <th>Description</th>
                            <th>Etudiants</th>
                            <th>unite</th>
                          </tr>
                          </thead>
                          <tbody>
                          @if($MORATS!=null)
                              @foreach($MORATS as $MORAT)
                                  <tr>
                                      <td>{{$MORAT->slug}}</td>
                                      <td>{{$MORAT->name}}</td>
                                      <td>{{$MORAT->description}}</td>
                                      <td>{{$MORAT->NBRE_PAIEMENTS()}}</td>
                                      <td>{{$MORAT->created_at}}</td>
                                  </tr>
                              @endforeach
                          @endif

                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                     <!-- /.box-body -->
                     <div class="box-footer clearfix">
                        <a href="{{route('moratoires.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-user-plus"></i> Nouvelle unite</a>
                         <a href="{{route('moratoires.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir touts</a>
                      </div>
                      <!-- /.box-footer -->
                  </div>
                  <!-- /.box -->

                  <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Quelques penalites</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>

                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="table-responsive">
                          <table class="table no-margin">
                            <thead>
                            <tr>
                              <th>IDENTIFIANT</th>
                              <th>unite</th>
                              <th>filiere</th>
                              <th>LABEL</th>
                              <th>periode</th>
                              <th>expire le</th>
                              <th>montant FCFA</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($PENALS!=null)
                                @foreach($PENALS as $PENAL)
                                    <tr>
                                        <td>{{$PENAL->slug}}</td>
                                        <td>{{$PENAL->UNITE()->name}}</td>
                                        <td>{{$PENAL->FILIERE()->name}}</td>
                                        <td>{{'tous les '.$PENAL->frequence.'  '}} @if($PENAL->periode==0) jour @elseif($PENAL->periode==1) semaine @else mois @endif</td>
                                        <td>{{$PENAL->delais}}</td>
                                        <td>{{$PENAL->created_at}}</td>
                                        <td>{{$PENAL->montant}}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.box-body -->
                       <!-- /.box-body -->
                       <div class="box-footer clearfix">
                          <a href="{{route('penalites.create')}}" class="btn btn-sm btn-info btn-fat pull-left">  <i class="fa fa-user-plus"></i> Nouvelle penalite</a>
                           <a href="{{route('penalites.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Voir toutes</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->


    </section>
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
<script src="{{ asset('/public/plugings/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/public/plugings/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/public/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/public/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/public/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/public/plugings/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
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
<script>
$(function () {

  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
var pieChart       = new Chart(pieChartCanvas)
var PieData        = [
{
value    : {{count($SOLVABLES)}},
color    : 'green',
highlight: '#f56954',
label    : 'Solvables'
},
{
value    : {{count($INSOLVABLES)}},
color    : 'red',
highlight: '#00a65a',
label    : 'Insolvables'
},
{
value    : {{count($MORATOIRES)}},
color    : 'yellow',
highlight: '#f39c12',
label    : 'moratoire'
},
]
var pieOptions     = {
//Boolean - Whether we should show a stroke on each segment
segmentShowStroke    : true,
//String - The colour of each segment stroke
segmentStrokeColor   : '#fff',
//Number - The width of each segment stroke
segmentStrokeWidth   : 2,
//Number - The percentage of the chart that we cut out of the middle
percentageInnerCutout: 50, // This is 0 for Pie charts
//Number - Amount of animation steps
animationSteps       : 100,
//String - Animation easing effect
animationEasing      : 'easeOutBounce',
//Boolean - Whether we animate the rotation of the Doughnut
animateRotate        : true,
//Boolean - Whether we animate scaling the Doughnut from the centre
animateScale         : false,
//Boolean - whether to make the chart responsive to window resizing
responsive           : true,
// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
maintainAspectRatio  : true,
//String - A legend template
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
pieChart.Doughnut(PieData, pieOptions)

})
</script>
</body>
</html>
