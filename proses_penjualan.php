<?php 
session_start();
include '../function/class.penjualan.php';

$penjualan = new Penjualan();

$aksi = $_GET['aksi'];

if ($aksi == "simpan") {
    $penjualan->input(
        $_POST['PenjualanID'],
        $_POST['TanggalPenjualan'],
        $_POST['TotalHarga'],
        $_POST['PelangganID']
    );
    header("location:../admin.php?page=penjualan");
}

if ($aksi == "update") {
    $penjualan->update(
        $_POST['PenjualanID'],
        $_POST['TanggalPenjualan'],
        $_POST['TotalHarga'],
        $_POST['PelangganID']
    );
    header("location:../admin.php?page=penjualan");
}

if ($aksi == "hapus") {
    $penjualan->hapus_detail_penjualan($_GET['ProdukID'], $_GET['PenjualanID']);
    header("location:../admin.php?page=penjualan");
}
?>