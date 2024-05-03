<?php
require_once 'header.php';
require_once '../koneksi.php';
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h2 class="mt-2"><b><font color='black'><font face="times">Data Petugas</font></b></h2>
      <a href="data-petugas-tambah.php" class="btn btn-warning mb-3"><font face='Cooper Black'><font color='white'>Tambah Data</font></a>
      <font face='times'>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th><p align="center">No</th>
                <th><p align="center">Username</th>
                <th><p align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM user WHERE level='petugas'";
              $result = $conn->query($sql);
              ?>
              <?php
              $no = 1;
              while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><b><p align="center"><?= $no ?></td>
                  <td><b><font size="3"><?= $row['username'] ?></td>
                  <td><p align="center">
                    <a href="data-petugas-edit.php?id=<?= $row['id_user'] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></a>
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