<?php
session_start();
if ($_SESSION['user']['level'] != 'petugas') {
  header("Location:../login.php");
}

?>
<?php require_once '../koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Halaman Petugas</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    .btn-xs,
    .btn-group-xs>.btn {
      --bs-btn-padding-y: 0.1rem;
      --bs-btn-padding-x: 0.4rem;
      --bs-btn-font-size: 0.875rem;
      --bs-btn-border-radius: 0.1rem;
    }
  </style>
</head>

<body class="sb-nav-fixed bg-success">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3"><b><font color='white'><font face="Imprint MT Shadow">Distro PaSHTer 22</font></b></a>
    <!-- Sidebar Toggle-->
    <button class="bg-success btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu bg-black">
          <div class="nav">
            <div class="sb-sidenav-menu-heading"><h4 class="text-center"><font color='yellow'>Menu</font></h4></div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
              <b><font color='lightgreen'>Beranda</font></b>
            </a>
            <a class="nav-link" href="pendataan-barang.php">
              <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
              <b><font color='lightgreen'>Data Barang</font></b>
            </a>
            <a class="nav-link" href="data-penjualan.php">
              <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
              <b><font color='lightgreen'>Data Penjualan</font></b>
            </a>
            <a class="nav-link" href="data-stock-barang.php">
              <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
              <b><font color='lightgreen'>Stock Barang</font></b>
            </a>
            <a class="nav-link" href="../logout.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
              <b><font color='lightgreen'>Logout</font></b>
            </a>
            <div>
      </nav>
    </div>
    <script>
      function formatRupiah(angka) {
        var numberString = angka.toString();

        var split = numberString.split('.');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
          var separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;

        return 'Rp ' + rupiah;
      }
    </script>