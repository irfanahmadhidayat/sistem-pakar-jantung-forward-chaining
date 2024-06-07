<!-- <!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
</head>

<body>
    <h1>Dashboard Admin</h1>
    <ul>
        <li><a href="penyakit.php">CRUD Penyakit</a></li>
        <li><a href="gejala.php">CRUD Gejala</a></li>
        <li><a href="aturan.php">CRUD Aturan</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>

</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-primary navbar-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">Sistem Pakar Penyakit Jantung</a>
            <a href="login.php" class="btn btn-light"><i class="fas fa-user"></i>&nbsp;&nbsp;Admin</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Jumbotron -->
    <div class="p-5 text-center rounded-3 mt-4">
        <h1 class="text-body-emphasis">Selamat Datang</h1>
        <p class="col-lg-8 mx-auto fs-5 text-muted">
            Sistem Pakar Penyakit Jantung ini adalah sebuah sistem yang dapat digunakan untuk melakukan diagnosa penyakit jantung yang ada didalam tubuh manusia. Diagnosa ini menggunakan metode forward chaining
        </p>
        <div class="d-inline-flex gap-2 mb-5">
            <a href="konsultasi.php" class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
                Mulai Konsultasi
            </a>
        </div>
    </div>
    <!-- Jumbotron End -->

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>