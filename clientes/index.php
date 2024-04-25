<?php
include('../verificar-autenticidade.php');
include('../conexao-pdo.php');
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
  <link rel="stylesheet" href="../dist/plugins/fontawesome-free/css/all.min.css">
  <!-- Boostrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../dist/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("../nav.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("../aside.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row pt-3">
            <div class="col">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Lista de clientes</h3>
                  <a href="./form.php" class="btn btn-sm btn-primary float-right rounded-circle">
                    <i class="bi bi-plus"></i>
                  </a>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>CÓD</th>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>WHATSAPP</th>
                        <th>E-MAIL</th>
                        <th>OPÇÕES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // MONTAR A SINTAXE SQL PARA ENVIAR AO MYSQL
                      $sql = "
                      SELECT pk_cliente, nome, cpf, whatsapp, email
                      FROM clientes
                      ORDER BY nome
                      ";
                      // PREPARA A SINTAXE NA CONEXÃO
                      $stmt = $conn->prepare($sql);
                      // EXECUTA O COMANDO NO MYSQL
                      $stmt->execute();
                      // RECEBE AS INFORMAÇÕES VINDAS DO MYSQL
                      $dados = $stmt->fetchAll(PDO::FETCH_OBJ);
                      // LAÇO DE REPETIÇÃO PARA PRINTAR INFORMAÇÕES
                      foreach ($dados as $row) {
                        echo '
                        <tr>
                          <td>' . $row->pk_cliente . '</td>
                          <td>' . $row->nome . '</td>
                          <td>' . $row->cpf . '</td>
                          <td>' . $row->whatsapp . '</td>
                          <td>' . $row->email . '</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <i class="bi bi-tools"></i>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="./form.php?ref=' . base64_encode($row->pk_cliente) . '">
                                  <i class="bi bi-pencil"></i> Editar
                                </a>
                                <a class="dropdown-item" href="./remover.php?ref=' . base64_encode($row->pk_cliente) . '">
                                  <i class="bi bi-trash"></i> Remover
                                </a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        ';
                      }
                      ?>
                    </tbody>
                  </table>
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
    <?php include("../footer.php"); ?>
    <!-- /. Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../dist/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../dist/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- SweetAlert2 -->
  <script src="../dist/plugins/sweetalert2/sweetalert2.min.js"></script>

  <?php include('../sweet-alert-2.php');?>

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

    })
  </script>
</body>

</html>