<?php
require_once "Pendaftaran.php";

class PendaftaranPrestasi extends Pendaftaran {
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->jenisPrestasi   = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Prestasi - {$this->jenisPrestasi} Tingkat {$this->tingkatPrestasi}";
    }

    // Metode Query Spesifik Jalur Prestasi (Sesuai Tahap 4)
    public static function getDaftarPrestasi($db) {
        $stmt = $db->query("SELECT * FROM `tabel_pendaftaran` WHERE `jalur_pendaftaran` = 'Prestasi'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
