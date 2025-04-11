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
                    <h1 class="m-0">Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-box mr-1"></i>
                                Kelola Data Barang
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
                                        Tambahkan data barang baru menggunakan form di bawah ini.
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="" class="mb-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="nama">Nama Barang</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                                </div>
                                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama barang" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                </div>
                                                <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" name="tambah" class="btn btn-primary btn-block">
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
                                                Daftar Data Barang
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
                                                            <th style="width: 40%">Nama Barang</th>
                                                            <th style="width: 20%">Jumlah</th>
                                                            <th style="width: 30%">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (isset($_POST['tambah'])) {
                                                            $nama = $_POST['nama'];
                                                            $jumlah = $_POST['jumlah'];
                                                            mysqli_query($conn, "INSERT INTO data_barang (nama_barang, jumlah) VALUES ('$nama', '$jumlah')");
                                                            echo "<meta http-equiv='refresh' content='0'>";
                                                        }

                                                        if (isset($_GET['hapus'])) {
                                                            $id = $_GET['hapus'];
                                                            mysqli_query($conn, "DELETE FROM data_barang WHERE id=$id");
                                                            echo "<meta http-equiv='refresh' content='0'>";
                                                        }

                                                        $no = 1;
                                                        $data = mysqli_query($conn, "SELECT * FROM data_barang");
                                                        while ($row = mysqli_fetch_assoc($data)) {
                                                            echo "<tr>
                                                                    <td>$no</td>
                                                                    <td>{$row['nama_barang']}</td>
                                                                    <td>{$row['jumlah']}</td>
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
                                <i class="fas fa-chart-bar mr-1"></i>
                                Grafik Data Barang
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Total Barang</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_barang");
                                                $row = mysqli_fetch_assoc($result);
                                                $total = $row['total'];
                                                ?>
                                                <h1 class="display-4"><?php echo $total; ?></h1>
                                                <p>Total Data Barang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Total Jumlah</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <?php
                                                $result = mysqli_query($conn, "SELECT SUM(jumlah) as total FROM data_barang");
                                                $row = mysqli_fetch_assoc($result);
                                                $total = $row['total'] ? $row['total'] : 0;
                                                ?>
                                                <h1 class="display-4"><?php echo $total; ?></h1>
                                                <p>Total Jumlah Barang</p>
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