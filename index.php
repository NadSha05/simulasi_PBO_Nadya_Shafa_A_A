<?php
// ==========================================
// 1. KONEKSI DATABASE (PDO)
// ==========================================
$host     = 'localhost';
$dbname   = 'db_simulasi_pbo_trpl1a_nadya_shafa_a_a';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// ==========================================
// 2. DEFINISI KELAS (PBO & POLIMORFISME)
// ==========================================
abstract class Pendaftaran {
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar) {
        $this->id_pendaftaran        = $id;
        $this->nama_calon            = $nama;
        $this->asal_sekolah          = $asal;
        $this->nilai_ujian           = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}

class PendaftaranReguler extends Pendaftaran {
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
        return "Prodi: " . ($this->pilihanProdi ?? '-') . " | Kampus: " . ($this->lokasiKampus ?? '-');
    }
}

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
        return "Jenis: " . ($this->jenisPrestasi ?? '-') . " | Tingkat: " . ($this->tingkatPrestasi ?? '-');
    }
}

class PendaftaranKedinasan extends Pendaftaran {
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
        return "Sponsor: " . ($this->instansiSponsor ?? '-') . " | SK: " . ($this->skIkatanDinas ?? '-');
    }
}

// Ambil parameter jalur dari URL (default ke 'Reguler')
$jalur = isset($_GET['jalur']) ? $_GET['jalur'] : 'Reguler';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background: #2c3e50; color: white; }
        .nav-link { color: #bdc3c7; cursor: pointer; transition: 0.3s; font-weight: 500; }
        .nav-link:hover, .nav-link.active { color: white; background: #34495e; border-radius: 4px; }
        .content-area { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .table th { background-color: #34495e !important; color: #ffffff !important; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 sidebar p-3">
            <h4 class="text-center py-3 border-bottom border-secondary">Menu Pendaftaran</h4>
            <ul class="nav flex-column mt-3 gap-2">
                <li class="nav-item">
                    <a class="nav-link <?= $jalur=='Reguler'?'active':'' ?>" href="?jalur=Reguler">Jalur Reguler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $jalur=='Prestasi'?'active':'' ?>" href="?jalur=Prestasi">Jalur Prestasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $jalur=='Kedinasan'?'active':'' ?>" href="?jalur=Kedinasan">Jalur Kedinasan</a>
                </li>
            </ul>
        </nav>

        <main class="col-md-10 p-4">
            <div class="content-area p-4">
                <h2 class="mb-3">Data Pendaftar Jalur <?= htmlspecialchars($jalur) ?></h2>
                
                <div class="mb-4">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari nama calon mahasiswa...">
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama Calon</th>
                                <th>Asal Sekolah</th>
                                <th>Nilai</th>
                                <th>Detail Data</th>
                                <th class="text-right">Total Biaya (Polymorphism)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                // Eksekusi query untuk mengambil data sesuai menu jalur yang diklik
                                $stmt = $db->prepare("SELECT * FROM `tabel_pendaftaran` WHERE `jalur_pendaftaran` = ?");
                                $stmt->execute([$jalur]);
                                $data = $stmt->fetchAll();

                                if (count($data) > 0) {
                                    foreach ($data as $row) {
                                        // Mencegah error undefined index dengan null coalescing
                                        $id    = $row['id_pendaftaran'] ?? 0;
                                        $nama  = $row['nama_calon'] ?? 'Tanpa Nama';
                                        $asal  = $row['asal_sekolah'] ?? '-';
                                        $nilai = $row['nilai_ujian'] ?? 0;
                                        $biaya = $row['biaya_pendaftaran_dasar'] ?? 0;

                                        // Instansiasi objek polimorfik secara dinamis
                                        if ($jalur == 'Reguler') {
                                            $obj = new PendaftaranReguler($id, $nama, $asal, $nilai, $biaya, $row['pilihan_prodi'] ?? '-', $row['lokasi_kampus'] ?? '-');
                                        } elseif ($jalur == 'Prestasi') {
                                            $obj = new PendaftaranPrestasi($id, $nama, $asal, $nilai, $biaya, $row['jenis_prestasi'] ?? '-', $row['tingkat_prestasi'] ?? '-');
                                        } else {
                                            $obj = new PendaftaranKedinasan($id, $nama, $asal, $nilai, $biaya, $row['sk_ikatan_dinas'] ?? '-', $row['instansi_sponsor'] ?? '-');
                                        }

                                        echo "<tr>";
                                        echo "<td>" . $id . "</td>";
                                        echo "<td>" . htmlspecialchars($nama) . "</td>";
                                        echo "<td>" . htmlspecialchars($asal) . "</td>";
                                        echo "<td>" . $nilai . "</td>";
                                        echo "<td>" . $obj->tampilkanInfoJalur() . "</td>";
                                        echo "<td class='text-right fw-bold'>Rp " . number_format($obj->hitungTotalBiaya(), 0, ',', '.') . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center py-4'>Belum ada data pendaftar untuk jalur ini.</td></tr>";
                                }
                            } catch (Exception $e) {
                                echo "<tr><td colspan='6' class='text-center text-danger py-4'>Terjadi kesalahan memuat data: {$e->getMessage()}</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tbody tr');
    
    rows.forEach(row => {
        // Kolom Nama Calon berada pada indeks sel ke-1 (kolom kedua)
        let nameCell = row.cells[1];
        if (nameCell) {
            let name = nameCell.textContent.toLowerCase();
            // Lakukan filter pencarian secara live saat text diketik
            row.style.display = name.indexOf(filter) > -1 ? '' : 'none';
        }
    });
});
</script>
</body>
</html>