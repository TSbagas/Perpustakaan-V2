<!-- php -->
  <?php
  session_start();
  include 'controllers/db.php';
  if ($_SESSION['login'] == null){
    header("location:login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Link resource -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Perpustakaan V2
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

</head>
<!-- Main -->
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center " href="dashboard.php">
        <i class="fa fa-book fa-2x align-middle" aria-hidden="true"></i>
        <span class="ms-1 font-weight-bold fs-5">Perpustakaan V2</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php
        // proses login jika sebagai petugas
        $level = $_SESSION['level'];
        if($level == 'petugas'){
          ?>
             <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php?pages=users">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php?pages=buku">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-book-bookmark text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Buku</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php?pages=siswa">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-hat-3 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Siswa</span>
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php?pages=peminjaman">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-shop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Peminjaman</span>
          </a>
        </li>
          <?php
        // proses login jika sebagai Siswa
        }else if($level == 'Siswa'){
          ?>
            <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php?pages=data peminjaman">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bag-17 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data peminjaman</span>
          </a>
        </li>
            <li class="nav-item mb-2">
          <a class="nav-link active" href="dashboard.php?pages=profile">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
          <?php
        }
        ?>
      </ul>
      </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">
            <?php if($_GET['pages']){
              echo ucfirst($_GET['pages']);
            }else{
              echo 'Dashboard';
            }
            $s = $data->Tampil_data('siswa','nisn',$_SESSION['nis']);
            ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <a href="dashboard.php?pages=profile"><span class="text-white btn my-2 ps-5">Welcome  
              <?php
              if($_SESSION['level'] == 'Siswa'){
                echo ucfirst($s->nama_siswa);
                ?>
                <img src="assets\img\gambar\<?=$s->foto ?>" alt="" width=50px height=50px class="rounded-circle mx-3" style="object-fit:cover">
                <?php
              }else{
                echo $_SESSION['username'];
                ?>
                <img src="assets\img\gambar\default.png?>" alt="" width=50px height=50px class="rounded-circle mx-3" style="object-fit:cover">
                <?php
              }
             ?> 
             </span></a>
            <a href="routes/proses.php?aksi=logout" class="btn btn-danger text-white ms-2 my-2">Log out</a>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <?php
    if($_SESSION['level'] == 'petugas'){
      ?>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Users</p>
                  <p class="mb-0 text-bold"><?=$data->Jumlah_DB('users');?></p>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-single-02  text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Siswa</p>
                  <p class="mb-0 text-bold"><?=$data->Jumlah_DB('siswa');?></p>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Buku</p>
                  <p class="mb-0 text-bold"><?=$data->Jumlah_DB('buku');?></p>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Peminjaman</p>
                  <p class="mb-0 text-bold"><?=$data->Jumlah_DB('peminjaman');?></p>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }elseif($_SESSION['level'] == 'Siswa'){
      ?>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Buku Anda</p>
                  <p class="mb-0 text-bold"><?=$data->Jumlah_DB('peminjaman');?></p>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
    }
    ?>
    
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-8 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <!-- This is content -->
                <?php
                // Proses Route
                @$pages = $_GET['pages'];
                if($_SESSION['level'] == 'petugas'){

                if($pages == 'users'){
                  @$act = $_GET['act'];
                  if($act == 'tambah'){
                    include "views/petugas/users/tambah.php";
                  }elseif($act == 'ubah'){
                    include "views/petugas/users/ubah.php";
                  }else {
                    include "views/petugas/users/users.php";
                  }
                }
                elseif($pages == 'buku'){
                  @$act = $_GET['act'];
                  if($act == 'tambah'){
                    include "views/petugas/buku/tambah.php";
                  }elseif($act == 'ubah'){
                    include "views/petugas/buku/ubah.php";
                  }else {
                    include "views/petugas/buku/buku.php";
                  }
                }
                elseif($pages == 'siswa'){
                  @$act = $_GET['act'];
                  if($act == 'tambah'){
                    include "views/petugas/siswa/tambah.php";
                  }elseif($act == 'ubah'){
                    include "views/petugas/siswa/ubah.php";
                  }else {
                    include "views/petugas/siswa/siswa.php";
                  }
                }
                elseif($pages == 'peminjaman'){
                  @$act = $_GET['act'];
                  if($act == 'tambah'){
                    include "views/petugas/peminjaman/tambah.php";
                  }else {
                    include "views/petugas/peminjaman/peminjaman.php";
                  }
                }else{
                  include "views/Page/pengertian_CRUD.php";
                }
                }elseif($_SESSION['level'] == 'Siswa'){
                  if($pages == 'data peminjaman'){
                    include "views/siswa/data_peminjaman.php";
                  }
                  elseif($pages == 'profile'){
                    include "views/siswa/profile.php";
                  }else{
                    include "views/siswa/data_peminjaman.php";
                  }
                
                  
              }
                
                  ?>
              <!-- END -->
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with
                <a href="#" class="font-weight-bold"><b>PHP</b> <i class="fa fa-heart"></i> Perpustakaan Mini V2</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css">
  <?php
  if(@$_SESSION['success'] != ''){
    ?>
  <script>
    Swal.fire(
    'Good job!',
    '<?=$_SESSION['success']?>',
    'success'
  )
  </script>
  <?php
    unset($_SESSION['success']);
   }
  if(@$_SESSION['warning'] != ''){
    ?>
    <script>
    Swal.fire(
    'Anda gagal login',
    '<?=$_SESSION['warning']?>',
    'warning'
  )
  </script>
  <?php
    unset($_SESSION['warning']);
  }

  ?>

</body>

</html>