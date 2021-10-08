<?php
include("backend/verificaLogin.php");
require("backend/conexao.php");

$query = "SELECT
id, message, DATE_FORMAT(STR_TO_DATE(convert_tz(date,@@session.time_zone,'-03:00'), '%Y-%m-%d %H:%i:%s'), '%d/%m/%Y %H:%i:%s') as 'date'
FROM control";

$result = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

$mensagem = "";
if (!mysqli_num_rows($result)) {
    $mensagem = "Nenhuma mensagem encontrada";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Start your development with a Dashboard for Bootstrap 4."
    />
    <meta name="author" content="Creative Tim" />
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png" />
    <!-- Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
    />
    <!-- Icons -->
    <link
      rel="stylesheet"
      href="./assets/vendor/nucleo/css/nucleo.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
      type="text/css"
    />
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link
      rel="stylesheet"
      href="./assets/css/argon.css?v=1.2.0"
      type="text/css"
    />
  </head>

  <body>
    <!-- Sidenav -->
    <nav
      class="
        sidenav
        navbar navbar-vertical
        fixed-left
        navbar-expand-xs navbar-light
        bg-white
      "
      id="sidenav-main"
    >
    
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header align-items-center">
          <a class="navbar-brand" href="javascript:void(0)">
            <img
              src="./assets/img/brand/blue.png"
              class="navbar-brand-img"
              alt="..."
            />
          </a>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="dashboard.html">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="backend/logout.php">
                  <i class="ni ni-fat-remove text-red"></i>
                  <span class="nav-link-text">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item">
              <a class="nav-link pr-0" >
                <div class="media align-items-center">
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Bem vindo <?php echo $_SESSION['usuario'] ?></span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
      <!-- Header -->
      <!-- Header -->
      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <nav
                  aria-label="breadcrumb"
                  class="d-none d-md-inline-block ml-md-4"
                >
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item">
                      <a href="#"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Principal</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--6">
        <div class="row">
          <div class="col-xl-8">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Visitas</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Mensagem</th>
                      <th scope="col">Data</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      while ($message = mysqli_fetch_object($result)) {
                        echo "<tr>
                              <th scope=\"row\">" . $message->id .      "</td>
                              <td>" . $message->message . "</td>
                              <td>" . $message->date .   "</td>
                              
                              </tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
              <div class="copyright text-center text-lg-left text-muted">
                &copy; 2021
                <a
                  href="https://www.creative-tim.com"
                  class="font-weight-bold ml-1"
                  target="_blank"
                  >Thiago Costa</a
                >
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="./assets/js/argon.js?v=1.2.0"></script>
  </body>
</html>
