<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "Koneksi.php";

$query = "SELECT * FROM prodi";
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
              <div class="col-sm-6"><h3 class="mb-0">Program Studi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="index.php">Mahasiswa</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="TambahMahasiswa.php">Tambah Mahasiswa</a></li>
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
                  <div class="card-header"><h3 class="card-title">DATA PRODI</h3></div>
                  <!-- /.card-header -->
                  
                <form action="tambahaksimahasiswa.php" method="post" enctype="multipart/form-data"> 
                    <div class="card-body">
                        <div class="form-group">
                            <label for="NIM" class="form-label text-start w-100">NIM</label>
                            <input type="text" class="form-control" id="NIM" name="NIM" required>
                        </div>
                        <div class="form-group">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="TanggalLahir" name="TanggalLahir" required>
                        </div>
                        <div class="form-group">
                            <label for="Telp" class="form-label">Telpon</label>
                            <input type="text" class="form-control" id="Telp" name="Telp" required>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email" name="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="Password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="Id" class="form-label">Prodi</label>
                            <select class="form-select" id="Id" name="Id" required>
                                <option value="" disabled selected>Pilih Prodi</option>
                                <?php foreach($data as $d) : ?>
                                    <option value="<?= $d["Id"] ?>"><?= $d["Nama"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </form>
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

