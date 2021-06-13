<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";

  // mengecek data post dari ajax
  if (isset($_POST['id'])) {
    // ambil data hasil post dari ajax
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    // tentukan nilai status
    $status = "1";
    // ambil tanggal dan waktu update data
    $updated_date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

    // sql statement untuk update data di tabel "tbl_antrian" berdasarkan "id"
    $update = mysqli_query($mysqli, "UPDATE tbl_antrian
                                     SET status='$status', updated_date='$updated_date'
                                     WHERE id='$id'")
                                     or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
  }
}
