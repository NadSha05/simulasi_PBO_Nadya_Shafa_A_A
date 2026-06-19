<?php
require_once "Pendaftaran.php";

class PendaftaranKedinasan extends Pendaftaran {
    // Properti Tambahan
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->skIkatanDinas   = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Kedinasan - Sponsor: {$this->instansiSponsor} (SK: {$this->skIkatanDinas})";
    }

    // Metode Query Spesifik Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $stmt = $db->query("SELECT * FROM `tabel_pendaftaran` WHERE `jalur_pendaftaran` = 'Kedinasan'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
