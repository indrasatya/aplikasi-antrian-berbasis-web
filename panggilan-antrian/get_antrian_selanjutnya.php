<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";

  // ambil tanggal sekarang
  $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

  // sql statement untuk menampilkan data "no_antrian" dari tabel "tbl_antrian" berdasarkan "tanggal" dan "status = 0"
  $query = mysqli_query($mysqli, "SELECT no_antrian FROM tbl_antrian 
                                  WHERE tanggal='$tanggal' AND status='0' 
                                  ORDER BY no_antrian ASC LIMIT 1")
                                  or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika data "no_antrian" ada
  if ($rows <> 0) {
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampilkan data
    $no_antrian = $data['no_antrian'];

    // tampilkan data
    echo number_format($no_antrian, 0, '', '.');
  } 
  // jika data "no_antrian" tidak ada
  else {
    // tampilkan "-"
    echo "-";
  }
}
