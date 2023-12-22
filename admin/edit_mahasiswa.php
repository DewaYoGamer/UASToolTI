<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Data Mahasiswa TI - Edit Mahasiswa</title>

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

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tbmahasiswa WHERE nim='$id'");
    $row = mysqli_fetch_assoc($result);

    $err = false;
    $nim_error = '';
    $nama_mahasiswa_error = '';
    $telp_error = '';
    $dosen_error = '';

    if(isset($_POST['simpan'])){
        $nim = $_POST['nim'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $telp = $_POST['telp'];
        $dosen = $_POST['dosen'];

        if ($nim == '' || strlen($nim) != 10) {
            $nim_error = 'NIM tidak valid, silahkan coba kembali';
            $err = true;
        }
        if ($nama_mahasiswa == '' || strlen($nama_mahasiswa) < 3) {
            $nama_mahasiswa_error = 'Nama mahasiswa tidak valid, silahkan coba kembali';
            $err = true;
        }
        if ($telp == '' || strlen($telp) < 8) {
            $telp_error = 'Nomor telepon tidak valid, silahkan coba kembali';
            $err = true;
        }
        if (empty($dosen)) {
            $dosen_error = 'Dosen tidak boleh kosong';
            $err = true;
        }

        if ($nim_error == '' && $nama_mahasiswa_error == '' && $telp_error == '' && $dosen_error == '') {
            $update = mysqli_query($conn, "UPDATE tbmahasiswa SET nim='$nim', namaMahasiswa='$nama_mahasiswa', telp='$telp', nidn='$dosen' WHERE nim='$id'");

            if($update){
                echo "<script>alert('Data berhasil diperbaharui!!'); window.location='mahasiswa_table.php';</script>";
            } else {
                echo "<script>alert('Data gagal diperbaharui!');</script>";
            }
        }
    }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon" style="width: 45px; height: 45px;">
                    <img src="img/hmti-colored.png" alt="Brand Icon" class="img-fluid" style="margin-top: 3px;">
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Mahasiswa Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMahasiswa"
                    aria-expanded="true" aria-controls="collapseMahasiswa">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Mahasiswa</span>
                </a>
                <div id="collapseMahasiswa" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add_mahasiswa.php">Tambah Mahasiswa</a>
                        <a class="collapse-item active" >Daftar Mahasiswa</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Dosen Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDosen"
                    aria-expanded="true" aria-controls="collapseDosen">
                    <i class="fas fa-fw fa-suitcase"></i>
                    <span>Dosen</span>
                </a>
                <div id="collapseDosen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add_dosen.php">Tambah Dosen</a>
                        <a class="collapse-item" href="dosen_table.php">Daftar Dosen</a>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Mahasiswa</h1>
                    
                    <div class="alert alert-light" role="alert">
                        <div class="card">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="card-body col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nim">NIM<span style="color:red;">*</span></label>
                                            <input class="form-control" name="nim" id="nim" type="number" placeholder="Masukan NIM" value="<?php if(!$err){echo $row['nim'];} else {echo htmlspecialchars($nim);} ?>"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="10" />
                                            <?php if ($nim_error): ?>
                                            <div style="color: red;"><?php echo $nim_error; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama_mahasiswa">Nama Mahasiswa<span style="color:red;">*</span></label>
                                            <input class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" type="text" placeholder="Masukan Nama Mahasiswa" value="<?php if(!$err){echo $row['namaMahasiswa'];} else {echo htmlspecialchars($nama_mahasiswa);} ?>" maxLength="255" />
                                            <?php if ($nama_mahasiswa_error): ?>
                                            <div style="color: red;"><?php echo $nama_mahasiswa_error; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="telp">Nomor Telepon<span style="color:red;">*</span></label>
                                            <input class="form-control" name="telp" id="telp" type="number" placeholder="Masukan Nomor Telepon" value="<?php if(!$err){echo $row['telp'];} else {echo htmlspecialchars($telp);} ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="13" />
                                            <?php if ($telp_error): ?>
                                            <div style="color: red;"><?php echo $telp_error; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlSelect1">Dosen Pembimbing<span style="color:red;">*</span></label>
                                            <select class="selectpicker form-control" id="exampleFormControlSelect1" name="dosen"
                                                data-live-search="true" title="Select Petugas" data-hide-disabled="true">
                                                <option disabled>-- Tambah Dosen --</option>
                                                <?php
                                                $tampil = mysqli_query($conn, "SELECT * FROM tbdosen");
                                                while ($data = mysqli_fetch_array($tampil)) {
                                                $selected = ($_POST['dosen'] == $data['nidn']) ? 'selected' : '';
                                                if(!$err){
                                                    echo '<option value="' . $data['nidn'] . '"' . ($data['nidn'] == $row['nidn'] ? ' selected' : '') . '>' . $data['namaDosen'] . '</option>';
                                                }
                                                else{
                                                    echo '<option value="' . $data['nidn'] . '"' . $selected . '>' . $data['namaDosen'] . '</option>';
                                                }

                                                } ?>
                                            </select>
                                            <?php if ($dosen_error): ?>
                                            <div style="color: red;"><?php echo $dosen_error; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="mahasiswa_table.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
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