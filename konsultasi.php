<?php
include 'db.php';

// Handle form submissions
$diagnosis = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_gejala = $_POST['gejala'];
    $selected_gejala_ids = implode(",", $selected_gejala);

    $query = "SELECT penyakit.nama 
              FROM aturan 
              JOIN penyakit ON aturan.penyakit_id = penyakit.id 
              WHERE aturan.gejala_id IN ($selected_gejala_ids) 
              GROUP BY penyakit.id 
              HAVING COUNT(DISTINCT aturan.gejala_id) = " . count($selected_gejala);
    $result = mysqli_query($conn, $query);
    $diagnosis = mysqli_fetch_assoc($result);
}
$gejala = mysqli_query($conn, "SELECT * FROM gejala");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Konsultasi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        .container {
            margin-top: 50px;
        }

        .checkbox-label {
            margin-left: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
                <div class="card mb-5">
                    <div class="card-header">
                        <h1>Konsultasi</h1>
                    </div>
                    <div class="card-body">
                        <p>Silahkan Pilih Gejala yang Anda Rasakan</p>
                        <form method="POST" action="konsultasi.php">
                            <div class="mb-3">
                                <?php while ($row = mysqli_fetch_assoc($gejala)) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gejala[]" value="<?php echo $row['id']; ?>" id="gejala<?php echo $row['id']; ?>">
                                        <label class="form-check-label checkbox-label" for="gejala<?php echo $row['id']; ?>">
                                            <?php echo $row['nama']; ?>
                                        </label>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Diagnosa</button>
                        </form>
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
                            <?php if ($diagnosis) : ?>
                                <h2 class="mt-4">Hasil Diagnosa: <?php echo $diagnosis['nama']; ?></h2>
                            <?php else : ?>
                                <h2 class="mt-4 text-danger">Penyakit belum diketahui, silahkan hubungi dokter secepatnya</h2>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>