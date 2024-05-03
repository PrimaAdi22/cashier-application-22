<?php
require_once 'header.php';
require_once '../koneksi.php';
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="container-fluid px-4">
       <h2 class="mt-2"><b><font color='black'><font face="times">Data Stock Barang</font></b></h2>
       <font face='times'>
      <div class="card mb-4 mt-5">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th><p align="center">No.</th>
                <th><p align="center">Nama Barang</th>
                 <th><p align="center">Kode Barang</th>
                <th><p align="center">Harga Jual</th>
                <th><p align="center">Harga Terakhir Beli</th>
                <th><p align="center">Stok Tersedia</th>
                <th><p align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM produk";
              $result = $conn->query($query); ?>
              <?php
              $no = 1;
              while ($row = $result->fetch_assoc()) {
                $query_harga_beli_terakhir = "SELECT pembelian_detail.harga_beli FROM pembelian_detail 
                    JOIN pembelian ON pembelian.pembelian_id = pembelian_detail.pembelian_id
                    WHERE produk_id = {$row['produk_id']} AND status='selesai'
                    ORDER BY tanggal_pembelian DESC LIMIT 1";
                $result_query_harga_beli_terakhir = $conn->query($query_harga_beli_terakhir);
                $pembelian = $result_query_harga_beli_terakhir->fetch_assoc();
              ?>
                <tr>
                  <td><b><p align="center"><?php echo $no ?></td>
                  <td><b><font size="3"><?php echo $row['nama_produk'] ?></td>
                  <td><b><font size="3"><p align="center"><?php echo $row['Kode'] ?></td>
                  <td><b><font size="3"><p align="center"><?php echo rupiah($row['harga']) ?></td>
                  <td><b><font size="3"><p align="center"><?php echo rupiah($pembelian['harga_beli']) ?></td>
                  <td><b><font size="3"><p align="center"><?php echo $row['stok_tersedia'] ?></td>
                  <td><p align="center">
                    <a href="data-stock-barang-detail.php?id=<?= $row['produk_id'] ?>" class="btn btn-success btn-xs">
                      <i class="fa fa-list"></i>
                    </a>
                  </td>
                </tr>
              <?php
                $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php
  if (!empty($_GET['hapus']) && $_GET['hapus'] == 1) {
    $produk_id = $_GET['id'];

    $query_update = "DELETE FROM produk WHERE produk_id=$produk_id";

    if ($conn->query($query_update) === TRUE) {
      echo '<script>
          alert("Berhasil menghapus data barang");
          window.location.href = "pendataan-barang.php";
        </script>';
      die;
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
  }
  ?>
  <?php
  $conn->close();
  ?>
  <?php require_once 'footer.php' ?>