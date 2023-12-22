<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Mahasiswa TI UNUD</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Background Video-->
        <img class="bg-image" src="assets/img/bg.jpg" alt="Background Image" />
        <!-- Masthead-->
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="fst lh-1 mb-4">Data Mahasiswa TI Udayana</h1>
                    <?php
                    if (isset($_GET['id'])) {
                        include 'admin/php/connect.php';

                        $stmt = $conn->prepare('SELECT tbmahasiswa.*, tbdosen.namaDosen FROM tbmahasiswa JOIN tbdosen ON tbmahasiswa.nidn = tbdosen.nidn WHERE nim = ?');

                        $stmt->bind_param('s', $_GET['id']);

                        $stmt->execute();

                        $result = $stmt->get_result();

                        $student = $result->fetch_assoc();

                        if ($student) {
                            echo '
                            <div style="display: flex; flex-direction: column; line-height: 2; font-size: 1.2em;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>NIM:</span>
                                    <span style="text-align: left;">'.$student['nim'].'</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>Nama Mahasiswa:</span>
                                    <span style="text-align: left;">'.$student['namaMahasiswa'].'</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>Nomor Telepon:</span>
                                    <span style="text-align: left;">'.$student['telp'].'</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span>Dosen Pembimbing:</span>
                                    <span style="text-align: left;">'.$student['namaDosen'].'</span>
                                </div>
                            </div>
                            ';
                        }
                        else{
                            echo "<p>NIM Tidak Ditemukan.</p>";
                        }
                    }
                    ?>
                    <div class="row input-group-newsletter" id="searchForm">
                        <div class="col-auto" style="margin-top: 20px;">
                            <button class="btn btn-primary" type="button" onclick="history.back()">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="/admin" target="_blank"><i class="fa-solid fa-user-tie"></i></a>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
