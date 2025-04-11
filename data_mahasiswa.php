<?php 
include "layout/header.php";
include 'koneksi.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-graduate mr-1"></i>
                                Kelola Data Mahasiswa
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <h5><i class="icon fas fa-info"></i> Info!</h5>
                                        Tambahkan data mahasiswa baru menggunakan form di bawah ini.
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="" class="mb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="nama">Nama Mahasiswa</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama mahasiswa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="nim">NIM</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                </div>
                                                <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" name="tambah" class="btn btn-success btn-block">
                                                <i class="fas fa-plus"></i> Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-list mr-1"></i>
                                                Daftar Data Mahasiswa
                                            </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%">No</th>
                                                            <th style="width: 45%">Nama Mahasiswa</th>
                                                            <th style="width: 25%">NIM</th>
                                                            <th style="width: 20%">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (isset($_POST['tambah'])) {
                                                            $nama = $_POST['nama'];
                                                            $nim = $_POST['nim'];
                                                            mysqli_query($conn, "INSERT INTO data_mahasiswa (nama_mahasiswa, nim) VALUES ('$nama', '$nim')");
                                                            echo "<meta http-equiv='refresh' content='0'>";
                                                        }

                                                        if (isset($_GET['hapus'])) {
                                                            $id = $_GET['hapus'];
                                                            mysqli_query($conn, "DELETE FROM data_mahasiswa WHERE id=$id");
                                                            echo "<meta http-equiv='refresh' content='0'>";
                                                        }

                                                        $no = 1;
                                                        $data = mysqli_query($conn, "SELECT * FROM data_mahasiswa");
                                                        while ($row = mysqli_fetch_assoc($data)) {
                                                            echo "<tr>
                                                                    <td>$no</td>
                                                                    <td>{$row['nama_mahasiswa']}</td>
                                                                    <td>{$row['nim']}</td>
                                                                    <td>
                                                                        <a href='?hapus={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>
                                                                            <i class='fas fa-trash'></i> Hapus
                                                                        </a>
                                                                    </td>
                                                                </tr>";
                                                            $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Statistik Data Mahasiswa
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Total Mahasiswa</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_mahasiswa");
                                                $row = mysqli_fetch_assoc($result);
                                                $total = $row['total'];
                                                ?>
                                                <h1 class="display-4"><?php echo $total; ?></h1>
                                                <p>Total Data Mahasiswa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Mahasiswa Terbaru</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT * FROM data_mahasiswa ORDER BY id DESC LIMIT 1");
                                                $row = mysqli_fetch_assoc($result);
                                                $nama = $row ? $row['nama_mahasiswa'] : '-';
                                                $nim = $row ? $row['nim'] : '-';
                                                ?>
                                                <h4><?php echo $nama; ?></h4>
                                                <p><?php echo $nim; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include "layout/footer.php";
?>