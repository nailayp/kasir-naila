<?php 
include_once 'config.php';

class Penjualan
{
    //buat variable untuk menyimpan koneksi db
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->return_db();
    }

    public function idauto()
    {
        $query = $this->db->prepare("SELECT MAX(PenjualanID) as terakhir FROM penjualan");
        $query->execute();
        $hasil = $query->get_result();
        $data   = $hasil->fetch_assoc();
        $lastID = $data['terakhir'];
        $nextID = $lastID + 1;
        return $nextID;
    }


   //menginput data paket yang akan dipilih
public function input_produk($DetailID, $PenjualanID, $ProdukID, $JumlahProduk)
{
    // Ambil stok produk sekarang
    $queryStok = $this->db->prepare("SELECT Stok FROM produk WHERE ProdukID = ?");
    $queryStok->bind_param("s", $ProdukID);
    $queryStok->execute();
    $hasilStok = $queryStok->get_result();
    $dataStok = $hasilStok->fetch_assoc();
    $stokSekarang = $dataStok['Stok'];

    // Perbarui stok produk
    $stokBaru = $stokSekarang - $JumlahProduk;
    $queryUpdateStok = $this->db->prepare("UPDATE produk SET Stok = ? WHERE ProdukID = ?");
    $queryUpdateStok->bind_param("is", $stokBaru, $ProdukID);
    $queryUpdateStok->execute();

    // Input detail penjualan
    $queryInputDetail = $this->db->prepare("INSERT INTO detailpenjualan (DetailID, PenjualanID, ProdukID, JumlahProduk, Subtotal)
    SELECT NULL, ?, ProdukID, ?, Harga * ? AS Subtotal
    FROM produk
    WHERE ProdukID = ?");
$queryInputDetail->bind_param("siii", $PenjualanID, $JumlahProduk, $JumlahProduk, $ProdukID);

    $queryInputDetail->execute();

    return true;
}


    //menampilkan produk di keranjang
    public function tampil_detail_produk()
    {
        $query = $this->db->prepare("SELECT dp.ProdukID, p.NamaProduk, dp.JumlahProduk, p.Harga, dp.Subtotal 
        FROM detailpenjualan dp
        JOIN produk p ON dp.ProdukID = p.ProdukID
        WHERE dp.PenjualanID > (SELECT MAX(PenjualanID) FROM penjualan)");

        $query->execute();
        $hasil =  $query->get_result();
        return $hasil;

    }

    //hapus produk di keranjang
    public function hapus_detail_penjualan($ProdukID, $PenjualanID)
    {
        $query = $this->db->prepare("DELETE FROM detailpenjualan WHERE ProdukID = '$ProdukID' AND PenjualanID = '$PenjualanID'");
        $query->execute();
        return true;
    }

    //input penjualan
    public function input_penjualan($PenjualanID, $TanggalPenjualan, $TotalHarga, $PelangganID)
    {
        $query =  $this->db->prepare("INSERT INTO penjualan VALUES('$PenjualanID', '$TanggalPenjualan', '$TotalHarga', '$PelangganID')");

        $query->execute();
        return true;
    }
        
}