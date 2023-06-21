 <!doctype html>
 <html lang="en" data-bs-theme="auto">
 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.111.3">
  <title></title>
  <link rel="stylesheet" type="text/css" href="	<?php echo 	url("assets/css/bootstrap.css"); ?>">




  <!-- Custom styles for this template -->
  <link href="<?php echo url("assets/css/dashboard.css") ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/dataTables.bootstrap5.min.css'); ?>">
</head>
<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="<?php echo url('siswa/dashboard') ?>" >SISWA</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo url('siswa/dashboard') ?>">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo url('siswa/profile') ?>">
                <span data-feather="user" class="align-text-bottom"></span>
                Profil
              </a>
            </li>


            
            <li class="nav-item">
              <a class="nav-link px-3" href="<?php echo url('logout') ?>"><span data-feather="log-out" class="align-text-bottom"></span> Logout</a>	
            </li>
          </ul>



        </div>
      </nav>


      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="card shadow p-3 my-3">
              <div class="card-body">
                @yield('konten')
              </div>
            </div>
        </main>

  </div>
</div>


<script src="<?php echo url("assets/js/bootstrap.bundle.min.js") ?>" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="<?php echo url("assets/js/dashboard.js") ?>"></script>

<script type="text/javascript" src="<?php echo url('assets/js/jquery-3.5.1.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('assets/js/dataTables.bootstrap5.min.js'); ?>"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#table').DataTable();
});

</script>
</body>
</html>
