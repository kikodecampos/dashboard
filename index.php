<?php
include('./verificar-autenticidade.php');
include('./conexao-pdo.php');

$pagina_ativa = 'home';

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SSS | Senac System Service</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css">
  <!-- Boostrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("nav.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("aside.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Página inicial</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $dados->total_os; ?></h3>

                  <p>Ordens de Serviço</p>
                </div>
                <div class="icon">
                  <i class="bi bi-cash-coin"></i>
                </div>
                <a href="./ordens_servico.php" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo intval($porcentagem_os_concluida); ?><sup style="font-size: 20px">%</sup></h3>
                  <p>Ordens Concluidas</p>
                </div>
                <div class="icon">
                  <i class="bi bi-check-circle"></i>
                </div>
                <a href="./ordens_servico.php" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $dados->total_clientes; ?></h3>

                  <p>Clientes</p>
                </div>
                <div class="icon">
                  <i class="bi bi-person"></i>
                </div>
                <a href="./clientes.php" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $dados->total_servicos; ?></h3>

                  <p>Serviços</p>
                </div>
                <div class="icon">
                  <i class="bi bi-tools"></i>
                </div>
                <a href="#" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- BAR CHART -->
          <div class="row">
            <div class="col">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Bar Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Footer -->
    <?php include("footer.php"); ?>
    <!-- /. Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="dist/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="dist/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- ChartJS -->
  <script src="dist/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <script>
    $(function() {

      $("#theme-mode").click(function() {
        // pegar atributo class do objeto
        var classMode = $("#theme-mode").attr("class")
        if (classMode == "fas fa-sun") {
          $("body").removeClass("dark-mode");
          $("#theme-mode").attr("class", "fas fa-moon");
          $("#navTopo").attr("class", "main-header navbar navbar-expand navbar-white navbar-light");
          $("#asideMenu").attr("class", "main-sidebar sidebar-light-primary elevation-4");
        } else {
          $("body").addClass("dark-mode");
          $("#theme-mode").attr("class", "fas fa-sun");
          $("#navTopo").attr("class", "main-header navbar navbar-expand navbar-black navbar-dark");
          $("#asideMenu").attr("class", "main-sidebar sidebar-dark-primary elevation-4");
        }
      });

      <?php
      $sql = "
      SELECT COUNT(pk_ordem_servico) total_os,
        DATE_FORMAT(data_ordem_servico,'%b/%y') mesAno,
        (
          SELECT COUNT(pk_ordem_servico)
              FROM ordens_servicos
              WHERE DATE_FORMAT(data_ordem_servico, '%m/%Y') = DATE_FORMAT(a.data_ordem_servico, '%m/%Y')
              AND data_fim <> '0000-00-00'
          ) total_concluidas
      FROM ordens_servicos a
      WHERE data_ordem_servico >= DATE_SUB(data_ordem_servico, INTERVAL 1 YEAR)
      GROUP BY DATE_FORMAT(data_ordem_servico,'%m/%Y')
      ORDER BY data_ordem_servico
      ";

      try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_OBJ);

        $meses = array();
        $total_os = array();
        $total_concluidas = array();
        foreach ($dados as $key => $row) {
          array_push($meses, "'$row->mesAno'");
          array_push($total_os, $row->total_os);
          array_push($total_concluidas, $row->total_concluidas);
        }

      } catch (PDOException $e) {
        echo "console.log('" . $e->getMessage() . "');";
      }
      ?>

      var areaChartData = {
        labels: [<?php echo implode(",", $meses);?>],
        datasets: [{
            label: 'O.S. Concluídas',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [<?php echo implode(",", $total_concluidas);?>]
          },
          {
            label: 'O.S. Total',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [<?php echo implode(",", $total_os);?>]
          },
        ]
      }

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    })
  </script>
</body>

</html>