<?php
require_once 'header.php';
require_once '../koneksi.php';
$id_user = $_SESSION['user']['id_user'];
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4"><font color='black'><font face="times">Data Penjualan</font></h1>
      <a href="data-penjualan-tambah.php" class="btn btn-warning mb-3"><font face='Cooper Black'><font color='white'>Tambah Data</font></a>
       <font face='times'>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th><p align="center">No</th>
                <th><p align="center">ID Penjualan</th>
                <th><p align="center">Waktu Penjualan</th>
                <th><p align="center">Total Penjualan</th>
                <th><p align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM penjualan WHERE id_user_petugas=$id_user   order by penjualan_id DESC";
              $result = $conn->query($sql);
              ?>
              <?php
              $no = 1;
              while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><b><p align="center"><?= $no ?></td>
                  <td><b><font size="3"><p align="center"><?= $row['penjualan_id'] ?></td>
                  <td><b><font size="3"><p align="center"><?= $row['tanggal_penjualan'] ?> <?= $row['jam_penjualan'] ?></td>
                  <td><b><font size="3"><p align="center"><?= rupiah($row['total_harga']) ?></td>
                  <td>
                    <p align="center">
                    <a href="data-penjualan-detail.php?id=<?= $row['penjualan_id'] ?>" class="btn btn-success btn-xs mt-1"><i class="fa fa-list"></i></a>
                  </td>
                </tr>
              <?php $no++;
              }
              $conn->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php require_once 'footer.php' ?>