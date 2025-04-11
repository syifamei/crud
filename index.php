<?php
include "layout/header.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Barang</span>
                            <span class="info-box-number">
                                <?php
                                include 'koneksi.php';
                                $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_barang");
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>
                            </span>
                            <a href="data_barang.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-graduate"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Mahasiswa</span>
                            <span class="info-box-number">
                                <?php
                                $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_mahasiswa");
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>
                            </span>
                            <a href="data_mahasiswa.php" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pengguna</span>
                            <span class="info-box-number">2</span>
                            <a href="#" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-pie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Data</span>
                            <span class="info-box-number">
                                <?php
                                $result1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_barang");
                                $row1 = mysqli_fetch_assoc($result1);
                                $result2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM data_mahasiswa");
                                $row2 = mysqli_fetch_assoc($result2);
                                echo $row1['total'] + $row2['total'];
                                ?>
                            </span>
                            <a href="#" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
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
                                Selamat Datang di Sistem CRUD
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Barang</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>Kelola data barang dengan mudah. Anda dapat menambah, melihat, dan menghapus data barang.</p>
                                            <a href="data_barang.php" class="btn btn-primary">Kelola Data Barang</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Mahasiswa</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>Kelola data mahasiswa dengan mudah. Anda dapat menambah, melihat, dan menghapus data mahasiswa.</p>
                                            <a href="data_mahasiswa.php" class="btn btn-success">Kelola Data Mahasiswa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-box mr-1"></i>
                                Data Barang Terbaru
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = mysqli_query($conn, "SELECT * FROM data_barang ORDER BY id DESC LIMIT 5");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                                <td>$no</td>
                                                <td>{$row['nama_barang']}</td>
                                                <td>{$row['jumlah']}</td>
                                            </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <a href="data_barang.php" class="text-primary">Lihat Semua Data Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-graduate mr-1"></i>
                                Data Mahasiswa Terbaru
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>NIM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = mysqli_query($conn, "SELECT * FROM data_mahasiswa ORDER BY id DESC LIMIT 5");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                                <td>$no</td>
                                                <td>{$row['nama_mahasiswa']}</td>
                                                <td>{$row['nim']}</td>
                                            </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <a href="data_mahasiswa.php" class="text-primary">Lihat Semua Data Mahasiswa</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle mr-1"></i>
                                Informasi Sistem
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>CRUD</h3>
                                            <p>Create, Read, Update, Delete</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-database"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>AdminLTE</h3>
                                            <p>Template Admin Dashboard</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>PHP</h3>
                                            <p>Backend Programming</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-code"></i>
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