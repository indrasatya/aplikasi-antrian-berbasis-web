<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";

  // ambil tanggal sekarang
  $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

  // membuat "no_antrian"
  // sql statement untuk menampilkan data "no_antrian" terakhir pada tabel "tbl_antrian" berdasarkan "tanggal"
  $query = mysqli_query($mysqli, "SELECT max(no_antrian) as nomor FROM tbl_antrian WHERE tanggal='$tanggal'")
                                  or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika "no_antrian" sudah ada
  if ($rows <> 0) {
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // "no_antrian" = "no_antrian" yang terakhir + 1
    $no_antrian = $data['nomor'] + 1;
  }
  // jika "no_antrian" belum ada
  else {
    // "no_antrian" = 1
    $no_antrian = 1;
  }

  // sql statement untuk insert data ke tabel "tbl_antrian"
  $insert = mysqli_query($mysqli, "INSERT INTO tbl_antrian(tanggal, no_antrian) 
                                   VALUES('$tanggal', '$no_antrian')")
                                   or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
  // cek query
  // jika proses insert berhasil
  if ($insert) {
    // tampilkan pesan sukses insert data
    echo "Sukses";
  }
}
