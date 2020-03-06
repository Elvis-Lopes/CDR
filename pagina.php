<?php
include 'db.php';
$query = "select d1, n1 from smp3 ";
$resultado = mysqli_query($con, $query);
$i = 0;

while ($dados = mysqli_fetch_array($resultado)){
    $d1[$i]= $dados['d1'];
    $n1[$i] = $dados['n1'];
    $i++;
}
$x = 0;
?>


<!--Projeto sendo desenvolvido para Surf telecom-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Surf Telecom</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="pagina.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Guuh teste</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Surf Telecom</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <img src="Surflogo.jpg" width="250px" alt="">
      </a>
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Surf</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  Gu
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Usuario Surf</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li>
          <ol>
              <li class="active"><a href="graficos.php"><i class="fa fa-users"></i> <span>Graficos</span></a></li>

          </ol>
          <ol>
            <li class="active"><a href="#"><i class="fa fa-users"></i> <span>Estatisticas</span></a></li> 
          </ol>
        </li>
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Graficos
        <small> Ánalise do grafico</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Usuários</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">1Anatel</h3>
              
            </div>
            <!-- /.box-header -->
              <div id="chart_div_1" style="width: 100%; height: 500px;"></div>
              
            <div class="box-body no-padding">
              <html>
  <head>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      var n1 = [];
      var d1 = [];
      
      <?php
        while($x<$i){
      ?>
        n1.push(<?php echo $n1[$x];?>);
        d1.push(<?php echo $d1[$x];?>);
      <?php
        $x++;
       }?>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'D1', 'N1'],
          ['',  0,      0],
        ]);
        
        var exibir = n1.length - 100;
        for(var cont = n1.length; cont > exibir; cont--){
            data.addRows([
                ['', d1[cont], n1[cont]] 
            ]);
        }

        var options = {
          title: 'SMP3',
          hAxis: {title: '',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_1'));
        chart.draw(data, options);
        
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_2'));
        chart.draw(data, options);
        
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_3'));
        chart.draw(data, options);
      }
      
      
    
      </script>
      
      
      
      
      <!-- Grafico 2 -->
      <div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">2Anatel</h3>
            </div>
            <!-- /.box-header -->
            <div id="chart_div_2" style="width: 100%; height: 500px;"></div>
            <div class="box-body no-padding">
      <section>
          
      </section>
    </div>
  
 
            </div>
            <!-- /.box-body -->
          </div>

        </div>
  
  
  <!-- Grafico 3-->
  <div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">3Anatel</h3>
            </div>
            <!-- /.box-header -->
            <div id="chart_div_3" style="width: 100%; height: 500px;"></div>
            <div class="box-body no-padding">
      <section>
          
      </section>
    </div>
  
 
            </div>
            <!-- /.box-body -->
          </div>

        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">

    Projeto desenvolvido para testes.
  </footer>

</div>

</body>
</html>