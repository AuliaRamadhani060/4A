
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
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">DATA MAHASISWA</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal lahir</th>
                            <th>Prodi</th>
                            <th>Telpon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=1;
                            foreach($data as $d) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?= $d["NIM"] ?></td>
                                    <td><?= $d["Nama"] ?></td>
                                    <td><?= $d["TanggalLahir"] ?></td>
                                    <td><?= $d["ProdiNama"] ?></td>
                                    <td><?= $d["Telp"] ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="editmahasiswa.php?NIM=<?= $d["NIM"] ?>">Edit</a> 
                                        <a class= "btn btn-danger" href="hapusmahasiswa.php?NIM=<?= $d["NIM"]  ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a> 
                                    </td>
                                </tr>

                        <?php endforeach; ?>

                    </tbody>
                    </table>
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
    <?php
    include "template/footer.php";
    ?>
