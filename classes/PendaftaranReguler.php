<?php
require_once "Pendaftaran.php";

class PendaftaranReguler extends Pendaftaran {
    // Properti Tambahan
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Reguler - Prodi: {$this->pilihanProdi}, Kampus: {$this->lokasiKampus}";
    }

    // Metode Query Spesifik Jalur Reguler
    public static function getDaftarReguler($db) {
        $stmt = $db->query("SELECT * FROM `tabel_pendaftaran` WHERE `jalur_pendaftaran` = 'Reguler'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>