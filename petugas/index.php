<?php require_once 'header.php' ?>

<?php
$sql = "SELECT count(produk_id) total FROM produk";
$result = $conn->query($sql);
$total_barang = $result->fetch_assoc()['total'];
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-2"><b><font color='black'><font face="times">Beranda</font></b></h2>
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item active"><h1 class="mt-2"><font color='white'><font face="algerian">"Selamat Datang"</font></h1></li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            Total Barang
                            <br>
                            <h1 class="mt-"><?php echo $total_barang ?></h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="pendataan-barang.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'footer.php' ?>