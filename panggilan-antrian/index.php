<!-- Aplikasi Antrian Berbasis Web 
**********************************************
* Developer   : Indra Styawantoro
* Company     : Indra Studio
* Release     : Juni 2021
* Update      : -
* Website     : www.indrasatya.com
* E-mail      : indra.setyawantoro@gmail.com
* WhatsApp    : +62-821-8686-9898
-->

<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-4">
      <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <i class="bi-mic-fill text-success me-3 fs-3"></i>
          <h1 class="h5 pt-2">Panggilan Antrian</h1>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://www.indrasatya.com/"><i class="bi-house-fill text-success"></i></a></li>
              <li class="breadcrumb-item" aria-current="page">Dashboard</li>
              <li class="breadcrumb-item" aria-current="page">Antrian</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <!-- menampilkan informasi jumlah antrian -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-people text-warning"></i>
                </div>
                <div>
                  <p id="jumlah-antrian" class="fs-3 text-warning mb-1"></p>
                  <p class="mb-0">Jumlah Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-check text-success"></i>
                </div>
                <div>
                  <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p>
                  <p class="mb-0">Antrian Sekarang</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person-plus text-info"></i>
                </div>
                <div>
                  <p id="antrian-selanjutnya" class="fs-3 text-info mb-1"></p>
                  <p class="mb-0">Antrian Selanjutnya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="bi-person text-danger"></i>
                </div>
                <div>
                  <p id="sisa-antrian" class="fs-3 text-danger mb-1"></p>
                  <p class="mb-0">Sisa Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="table-responsive">
            <table id="tabel-antrian" class="table table-bordered table-striped table-hover" width="100%">
              <thead>
                <tr>
                  <th>Nomor Antrian</th>
                  <th>Status</th>
                  <th>Panggil</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <hr class="my-4">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2021 - <a href="https://www.indrasatya.com/" target="_blank" class="text-danger text-decoration-none">www.indrasatya.com</a>. All rights reserved.
      </div>
    </div>
  </footer>

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="../assets/audio/tingtung.mp3"></audio>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan informasi antrian
      $('#jumlah-antrian').load('get_jumlah_antrian.php');
      $('#antrian-sekarang').load('get_antrian_sekarang.php');
      $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
      $('#sisa-antrian').load('get_sisa_antrian.php');

      // menampilkan data antrian menggunakan DataTables
      var table = $('#tabel-antrian').DataTable({
        "lengthChange": false,              // non-aktifkan fitur "lengthChange"
        "searching": false,                 // non-aktifkan fitur "Search"
        "ajax": "get_antrian.php",          // url file proses tampil data dari database
        // menampilkan data
        "columns": [{
            "data": "no_antrian",
            "width": '250px',
            "className": 'text-center'
          },
          {
            "data": "status",
            "visible": false
          },
          {
            "data": null,
            "orderable": false,
            "searchable": false,
            "width": '100px',
            "className": 'text-center',
            "render": function(data, type, row) {
              // jika tidak ada data "status"
              if (data["status"] === "") {
                // sembunyikan button panggil
                var btn = "-";
              } 
              // jika data "status = 0"
              else if (data["status"] === "0") {
                // tampilkan button panggil
                var btn = "<button class=\"btn btn-success btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
              } 
              // jika data "status = 1"
              else if (data["status"] === "1") {
                // tampilkan button ulangi panggilan
                var btn = "<button class=\"btn btn-secondary btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
              };
              return btn;
            }
          },
        ],
        "order": [
          [0, "desc"]             // urutkan data berdasarkan "no_antrian" secara descending
        ],
        "iDisplayLength": 10,     // tampilkan 10 data per halaman
      });

      // panggilan antrian dan update data
      $('#tabel-antrian tbody').on('click', 'button', function() {
        // ambil data dari datatables 
        var data = table.row($(this).parents('tr')).data();
        // buat variabel untuk menampilkan data "id"
        var id = data["id"];
        // buat variabel untuk menampilkan audio bell antrian
        var bell = document.getElementById('tingtung');

        // mainkan suara bell antrian
        bell.pause();
        bell.currentTime = 0;
        bell.play();

        // set delay antara suara bell dengan suara nomor antrian
        durasi_bell = bell.duration * 770;

        // mainkan suara nomor antrian
        setTimeout(function() {
          responsiveVoice.speak("Nomor Antrian, " + data["no_antrian"] + ", menuju, loket, 1", "Indonesian Male", {
            rate: 0.9,
            pitch: 1,
            volume: 1
          });
        }, durasi_bell);

        // proses update data
        $.ajax({
          type: "POST",               // mengirim data dengan method POST
          url: "update.php",          // url file proses update data
          data: { id: id }            // tentukan data yang dikirim
        });
      });

      // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
      setInterval(function() {
        $('#jumlah-antrian').load('get_jumlah_antrian.php').fadeIn("slow");
        $('#antrian-sekarang').load('get_antrian_sekarang.php').fadeIn("slow");
        $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php').fadeIn("slow");
        $('#sisa-antrian').load('get_sisa_antrian.php').fadeIn("slow");
        table.ajax.reload(null, false);
      }, 1000);
    });
  </script>
</body>

</html>