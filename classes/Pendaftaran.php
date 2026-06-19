<?php
abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected)
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
    abstract public function hitungTotalBiaya(); //
    abstract public function tampilkanInfoJalur(); //
}
?>