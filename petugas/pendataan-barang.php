<?php
require_once 'header.php';
require_once '../koneksi.php';
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h2 class="mt-2"><b><font color='black'><font face="times">Data Barang</font></b></h2>
      <a href="pendataan-barang-tambah.php" class="btn btn-warning mb-3"><font face='Cooper Black'><font color='white'>Tambah Data</font></a>
       <font face='times'>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th><p align="center">No.</th>
                <th><p align="center">Nama Barang</th>
                <th><p align="center">Harga Barang</th>
                <th><p align="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM produk";
              $result = $conn->query($query); ?>
              <?php
              $no = 1;
              while ($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><b><p align="center"><?php echo $no ?></td>
                  <td><b><font size="3"><?php echo $row['nama_produk'] ?></td>
                  <td><b><font size="3"><p align="center"><?php echo rupiah($row['harga']) ?></td>
                  <td>
                    <p align="center"><a href="pendataan-barang-edit.php?id=<?= $row['produk_id'] ?>" class="btn btn-success btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="pendataan-barang.php?id=<?php echo $row['produk_id'] ?>&hapus=1" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">
                      <i class="fa fa-trash"></i>
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