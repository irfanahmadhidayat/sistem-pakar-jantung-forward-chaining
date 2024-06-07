<?php
include 'auth.php';
include 'db.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $sql = "INSERT INTO gejala (kode, nama) VALUES ('$kode', '$nama')";
        mysqli_query($conn, $sql);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $sql = "UPDATE gejala SET kode='$kode', nama='$nama' WHERE id=$id";
        mysqli_query($conn, $sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM gejala WHERE id=$id";
        mysqli_query($conn, $sql);
    }
}

// Fetch data for display
$gejala = mysqli_query($conn, "SELECT * FROM gejala");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3 ">
                    <h3 class="text-primary">SPFC</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="penyakit.php" class="nav-item nav-link"><i class="fas fa-plus-circle me-2"></i>Data Penyakit</a>
                    <a href="gejala.php" class="nav-item nav-link active"><i class="fas fa-list me-2"></i>Data Gejala</a>
                    <a href="aturan.php" class="nav-item nav-link"><i class="fas fa-exclamation-circle me-2"></i>Aturan</a>
                    <a href="logout.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0 pt-3 pb-3">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">
                        <i class="fa fa-hashtag"></i>
                    </h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0 text-decoration-none">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <!-- Navbar End -->

            <!-- Data Gejala Start -->
            <div class="container pt-4 px-4 mb-4">
                <h1>Data Gejala</h1>
                <a href="#" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showAddModal()">Tambah Data</a>

                <!-- Modal Tambah Data dan Edit Data -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Gejala</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="gejala.php">
                                    <input type="hidden" id="id" name="id">
                                    <div class="mb-3">
                                        <label for="kode" class="col-form-label">Kode:</label>
                                        <input type="text" class="form-control" id="kode" name="kode">
                                    </div>
                                    <div class="mb-5">
                                        <label for="nama" class="col-form-label">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="add" class="btn btn-primary" id="addButton">Tambah Data</button>
                                        <button type="submit" name="update" class="btn btn-primary" id="updateButton">Update Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah Data dan Edit Data End -->

                <!-- Modal Delete Data -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                <form method="POST" action="gejala.php">
                                    <input type="hidden" id="delete-id" name="id">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Delete Data End -->

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($gejala)) : ?>
                                <tr>
                                    <td><?php echo $row['kode']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td>
                                        <button onclick="editGejala(<?php echo $row['id']; ?>, '<?php echo $row['kode']; ?>', '<?php echo $row['nama']; ?>')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                        <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Data Gejala End -->
        </div>
        <!-- Content End -->
    </div>

    <script>
        function showAddModal() {
            document.getElementById('id').value = '';
            document.getElementById('kode').value = '';
            document.getElementById('nama').value = '';
            document.querySelector('#addButton').style.display = 'inline-block';
            document.querySelector('#updateButton').style.display = 'none';
        }

        function editGejala(id, kode, nama) {
            document.getElementById('id').value = id;
            document.getElementById('kode').value = kode;
            document.getElementById('nama').value = nama;
            document.querySelector('#addButton').style.display = 'none';
            document.querySelector('#updateButton').style.display = 'inline-block';
        }

        function confirmDelete(id) {
            document.getElementById('delete-id').value = id;
        }
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/chart/chart.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>