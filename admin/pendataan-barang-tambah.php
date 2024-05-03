<?php require_once 'header.php' ?>
<?php require_once 'proses-tambah-barang.php' ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><b><font color='black'><font face="times">Pendataan Barang</font></h2>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="username" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga" required>
                            </div>
                        </div>
                
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success"><b><font color='black'><font face="times">Simpan Data</font></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'footer.php' ?>