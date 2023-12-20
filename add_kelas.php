<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Data Mahasiswa TI - Tambah Mahasiswa</title>

    <link rel="icon" type="image/x-icon" href="img/hmti-colored.ico">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php include("php/connect.php"); 
    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
    }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
                <div class="sidebar-brand-icon" style="width: 45px; height: 45px;">
                    <img src="img/hmti-colored.png" alt="Brand Icon" class="img-fluid" style="margin-top: 3px;">
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Mahasiswa Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMahasiswa"
                    aria-expanded="true" aria-controls="collapseMahasiswa">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Mahasiswa</span>
                </a>
                <div id="collapseMahasiswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add_mahasiswa.php">Tambah Mahasiswa</a>
                        <a class="collapse-item" href="mahasiswa_table.php">Daftar Mahasiswa</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Kelas Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelas"
                    aria-expanded="true" aria-controls="collapseKelas">
                    <i class="fas fa-fw fa-suitcase"></i>
                    <span>Kelas</span>
                </a>
                <div id="collapseKelas" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active">Tambah Kelas</a>
                        <a class="collapse-item" href="kelas_table.php">Daftar Kelas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Kelas</h1>

                    <div class="alert alert-light" role="alert">
                        <div class="card">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="idKelas">ID Kelas<span style="color:red;">*</span></label>
                                            <input class="form-control" name="idKelas" id="idKelas" type="text" placeholder="Masukan ID Kelas" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="5" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_kelas">Nama Kelas<span style="color:red;">*</span></label>
                                            <input class="form-control" name="nama_kelas" id="nama_kelas" type="text" placeholder="Masukan Nama Kelas" maxLength="255" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_dosen">Nama Dosen<span style="color:red;">*</span></label>
                                            <input class="form-control" name="nama_dosen" id="nama_dosen" type="text" placeholder="Masukan Nama Dosen" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="255" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <button type="button" onclick="window.history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                        <?php
                        if(isset($_POST['simpan'])){
                        $idKelas = $_POST['idKelas'];
                        $nama_kelas = $_POST['nama_kelas'];
                        $nama_dosen = $_POST['nama_dosen'];

                        
                        if ($idKelas == '' || $nama_kelas == '' || $nama_dosen == '' || strlen($nama_kelas) < 3 || strlen($nama_dosen) < 3 || strlen($idKelas) != 5) {
                            echo "<script>alert('Masukan tidak valid, silahkan coba kembali');</script>";
                        } else {
                            $check = mysqli_query($conn, "SELECT * FROM tbkelas WHERE idKelas='$idKelas'");
                            if (mysqli_num_rows($check) > 0) {
                                echo "<script>alert('ID sudah ada, silahkan coba lagi');</script>";
                            } else {
                                $simpan = mysqli_query($conn, 'INSERT INTO tbkelas(idKelas,namaKelas,namaDosen) VALUES ("'.$idKelas.'", "'.$nama_kelas.'", "'.$nama_dosen.'")' );
                                echo '
                                <script>
                                alert("Kelas berhasil ditambahkan!");
                                window.location="kelas_table.php";
                                </script>
                                ';
                            }
                        }   
                        }
                        ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Dewa Putu Ananta Prayoga 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Logout" jika Anda yakin untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="php/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>