<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INSCRIPTION IAI IMPRESSION DU RECU</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
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

          </div>


      </div>



  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
