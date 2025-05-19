<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "Koneksi.php";

$query = "SELECT mahasiswa.*, prodi.Nama AS ProdiNama 
          FROM mahasiswa 
          JOIN prodi ON mahasiswa.Id = prodi.Id";
$data = ambildata($query);

include "template/header.php";
include "template/sidebar.php";
?>

<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Data Mahasiswa</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="index.php">Mahasiswa</a></li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4 shadow-lg border-0 animate__animated animate__fadeIn">
                  <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <div>
                      <i class="bi bi-people-fill me-2"></i>
                      <span class="fs-5 fw-bold">DATA MAHASISWA</span>
                    </div>
                    <div class="d-flex gap-2">
                      <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari Mahasiswa..." style="width:180px;">
                      <a href="tambahmahasiswa.php" class="btn btn-success btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i>Tambah
                      </a>
                    </div>
                  </div>
                  <div class="card-body bg-light rounded-bottom">
                    <div class="table-responsive">
                      <table id="mahasiswaTable" class="table table-hover align-middle table-bordered table-striped">
                        <thead class="table-primary">
                          <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Prodi</th>
                            <th>Telpon</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach($data as $d) : ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <td>
                              <span class="badge bg-info text-dark"><?= $d["NIM"] ?></span>
                            </td>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <img src="assets/img/<?= $d["foto"] ?>" class="rounded-circle shadow-sm avatar-mahasiswa" width="36" height="36" alt="avatar">
                                <span class="fw-semibold"><?= $d["Nama"] ?></span>
                              </div>
                            </td>
                            <td><?= date('d M Y', strtotime($d["TanggalLahir"])) ?></td>
                            <td>
                              <span class="badge badge-prodi"><?= $d["ProdiNama"] ?></span>
                            </td>
                            <td>
                              <a href="tel:<?= $d["Telp"] ?>" class="text-decoration-none" data-bs-toggle="tooltip" title="Hubungi">
                                <i class="bi bi-telephone-fill"></i> <?= $d["Telp"] ?>
                              </a>
                            </td>
                            <td>
                              <a class="btn btn-warning btn-sm" href="editmahasiswa.php?NIM=<?= $d["NIM"] ?>" data-bs-toggle="tooltip" title="Edit Data">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                              <a class="btn btn-danger btn-sm" href="hapusmahasiswa.php?NIM=<?= $d["NIM"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" data-bs-toggle="tooltip" title="Hapus Data">
                                <i class="bi bi-trash"></i>
                              </a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container--> 
        </div>
        <!--end::App Content-->
 </main>
    
<!-- Tambahkan animasi dan interaksi -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Search filter
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('mahasiswaTable');
    searchInput.addEventListener('keyup', function() {
      const filter = searchInput.value.toLowerCase();
      for (let row of table.tBodies[0].rows) {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
        row.classList.toggle('table-warning', filter && text.includes(filter));
      }
    });

    // Table sorting
    document.querySelectorAll('#mahasiswaTable th').forEach((th, idx) => {
      th.style.cursor = 'pointer';
      th.addEventListener('click', () => {
        const tbody = th.closest('table').querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const asc = th.dataset.asc = !(th.dataset.asc === 'true');
        rows.sort((a, b) => {
          let t1 = a.children[idx].innerText.trim();
          let t2 = b.children[idx].innerText.trim();
          return asc ? t1.localeCompare(t2, undefined, {numeric:true}) : t2.localeCompare(t1, undefined, {numeric:true});
        });
        rows.forEach(row => tbody.appendChild(row));
      });
    });
  });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
/* Gradient header card */
.bg-gradient-primary {
  background: linear-gradient(90deg, #0072ff 0%, #00c6ff 100%) !important;
  color: #fff !important;
  box-shadow: 0 4px 24px rgba(0,114,255,0.12);
}
/* Prodi badge lebih menonjol */
.badge-prodi {
  background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
  color: #222 !important;
  font-weight: bold;
  font-size: 1rem;
  box-shadow: 0 2px 8px rgba(56,249,215,0.15);
  border-radius: 1rem;
  padding: 0.5em 1.2em;
  letter-spacing: 0.5px;
}
/* Avatar styling */
.avatar-mahasiswa {
  border: 2px solid #38f9d7;
  box-shadow: 0 2px 8px rgba(56,249,215,0.15);
  transition: transform 0.2s;
}
.avatar-mahasiswa:hover {
  transform: scale(1.08) rotate(-2deg);
}
/* Table row hover effect */
#mahasiswaTable tbody tr:hover {
  background: linear-gradient(90deg, #e0f7fa 0%, #f8ffae 100%);
  transition: background 0.3s;
  color: #222;
}
/* Responsive table font */
@media (max-width: 768px) {
  #mahasiswaTable th, #mahasiswaTable td {
    font-size: 0.95rem;
  }
}
</style>

<!-- Tambahkan di bawah sebelum </body> -->
<div id="react-mahasiswa"></div>
<script src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script type="text/babel">
function MahasiswaTable({ data }) {
  const [search, setSearch] = React.useState('');
  const [sortIdx, setSortIdx] = React.useState(null);
  const [asc, setAsc] = React.useState(true);

  let filtered = data.filter(d =>
    Object.values(d).join(' ').toLowerCase().includes(search.toLowerCase())
  );
  if (sortIdx !== null) {
    filtered.sort((a, b) => {
      let keys = Object.keys(a);
      let t1 = a[keys[sortIdx]];
      let t2 = b[keys[sortIdx]];
      return asc ? (''+t1).localeCompare(t2) : (''+t2).localeCompare(t1);
    });
  }

}

// Data PHP ke JS
const mahasiswaData = <?php echo json_encode($data); ?>;
ReactDOM.createRoot(document.getElementById('react-mahasiswa')).render(<MahasiswaTable data={mahasiswaData} />);
</script>

<?php
  include "template/footer.php";
?>