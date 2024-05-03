<?php
require_once 'header.php';
require_once '../koneksi.php';
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
       <h2 class="mt-2"><b><font color='black'><font face="times">Data Pembelian</font></b></h2>
      <a href="data-pembelian-tambah.php" class="btn btn-warning mb-3"><font face='Cooper Black'><font color='white'>Tambah Data</font></a>
      <font face='times'>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th><p align="center">No</th>
                <th><p align="center">Tanggal Pembelian</th>
                <th><p align="center">Nama Supplier</th>
                <th><p align="center">Invoice Pembelian</th>
                <th><p align="center">Total Pembelian</th>
                <th><p align="center">Status</th>
                <th><p align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM pembelian order by tanggal_pembelian DESC";
              $result = $conn->query($sql);
              ?>
              <?php
              $no = 1;
              while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><b><p align="center"><?= $no ?></td>
                  <td><b><font size="3"><p align="center"><?= $row['tanggal_pembelian'] ?></td>
                  <td><b><font size="3"><?= $row['nama_supplier'] ?></td>
                  <td><b><font size="3"><?= $row['invoice_pembelian'] ?></td>
                  <td><b><font size="3"><p align="center"><?= rupiah($row['total_harga']) ?></td>
                  <td><p align="center">
                    <?php
                    if ($row['status'] == 'draft') {
                      echo '<span class="badge bg-warning text-dark">Draft</span>';
                    } else {
                      echo '<span class="badge bg-success">Selesai</span>';
                    }
                    ?>
                  </td>
                  <td><p align="center">
                    <?php if ($row['status'] == 'draft') { ?>
                      <a href="data-pembelian-edit.php?id=<?= $row['pembelian_id'] ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                      <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                      <a href="data-pembelian-selesai.php?id=<?= $row['pembelian_id'] ?>" class="btn btn-success btn-xs mt-1"><i class="fa fa-check"></i></a>
                    <?php } ?>
                    <a href="data-pembelian-detail.php?id=<?= $row['pembelian_id'] ?>" class="btn btn-warning btn-xs mt-1"><i class="fa fa-list"></i></a>
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