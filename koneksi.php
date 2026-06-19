<?php
// ==========================================
// 1. KONEKSI DATABASE (PDO)
// ==========================================
$host = 'localhost';
$dbname = 'db_simulasi_pbo_trpl1a_nadya_shafa_a_a'; // Nama database dari file .sql
$username = 'root'; 
$password = ''; 

try {
    // Membuat instance PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Mengatur mode error menjadi Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// ==========================================
// 2, 3, & 4. ABSTRACTION & ENKAPSULASI
// ==========================================

abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected)
    // Dipetakan dari kolom tabel 'tabel_pendaftaran'
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Konstruktor untuk memetakan data dari database ke properti
    public function __construct($id, $nama, $asal, $nilai, $biayaDasar) {
        $this->id_pendaftaran        = $id;
        $this->nama_calon            = $nama;
        $this->asal_sekolah          = $asal;
        $this->nilai_ujian           = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    // Metode Abstrak (Wajib diimplementasikan di subclass)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>