<?php
// 1. Konfigurasi Koneksi Database
$host     = "localhost";
$user     = "root";
$password = "";
$database = "calon_mhs";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container{
            width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 10px;
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=date]{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btn{
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover{
            background: darkblue;
        }

        .info{
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <?php
    // 2. Proses Simpan Data Ke Database
    if (isset($_POST['simpan'])) {
        $tgl_input     = $_POST['tgl_input'];
        $kode          = strtoupper($_POST['kode']);
        $nama          = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jk            = $_POST['jk'];
        $asal_sekolah  = mysqli_real_escape_string($koneksi, $_POST['asal_sekolah']);
        $pekerjaan_ortu= mysqli_real_escape_string($koneksi, $_POST['pekerjaan_ortu']);
        $tempat_lahir  = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
        $tgl_lahir     = $_POST['tgl_lahir'];

        // Penggabungan tempat dan tanggal lahir
        $ttl = $tempat_lahir . ", " . $tgl_lahir;

        $mat  = $_POST['mat'];
        $bing = $_POST['bing'];
        $umum = $_POST['umum'];

        // Hitung rata-rata
        $rata = ($mat + $bing + $umum) / 3;

        // Menentukan keterangan
        if ($rata >= 70) {
            $keterangan = "Lulus";
        } elseif ($rata >= 60) {
            $keterangan = "Cadangan";
        } else {
            $keterangan = "Tidak Lulus";
        }

        // Simpan ke database
        $query_insert = "INSERT INTO calon_mhs 
            (kode, nama, jenis_kelamin, ttl, asal_sekolah, pekerjaan_ortu, matematika, inggris, umum, rata_rata, keterangan) 
            VALUES 
            ('$kode', '$nama', '$jk', '$ttl', '$asal_sekolah', '$pekerjaan_ortu', '$mat', '$bing', '$umum', '$rata', '$keterangan')";

        if (mysqli_query($koneksi, $query_insert)) {
            echo "<div class='alert-success'>Data berhasil disimpan ke database!</div>";
        } else {
            echo "<div class='alert-danger'>Gagal menyimpan data: " . mysqli_error($koneksi) . "</div>";
        }
    }
    ?>

    <form method="POST">
        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" value="<?php echo date('Y-m-d'); ?>" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" step="0.01" name="mat" required>

        <label>Bahasa Inggris</label>
        <input type="number" step="0.01" name="bing" required>

        <label>Umum</label>
        <input type="number" step="0.01" name="umum" required>

        <button type="submit" name="simpan" class="btn">SIMPAN DATA</button>
    </form>

    <h3 style="margin-top: 40px; text-align: center;">DATA CALON MAHASISWA TERDAFTAR</h3>

    <!-- 3. Menampilkan Data dari Database -->
    <table>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>JK</th>
            <th>TTL</th>
            <th>Asal Sekolah</th>
            <th>Pekerjaan Ortu</th>
            <th>Tempat Tes</th>
            <th>MAT</th>
            <th>B. Inggris</th>
            <th>Umum</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
        </tr>

        <?php
        $query_select = "SELECT * FROM calon_mhs ORDER BY id DESC";
        $result = mysqli_query($koneksi, $query_select);

        $jumlah_pendaftar = mysqli_num_rows($result);
        $jumlah_lulus = 0;
        $jumlah_tidak_lulus = 0;

        if ($jumlah_pendaftar > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Hitung rekap lulus / tidak lulus
                if ($row['keterangan'] == "Lulus") {
                    $jumlah_lulus++;
                } elseif ($row['keterangan'] == "Tidak Lulus") {
                    $jumlah_tidak_lulus++;
                }

                // Menentukan tempat tes berdasarkan kode
                $kode_awal = substr($row['kode'], 0, 1);
                if ($kode_awal == "A") {
                    $tempat_tes = "Gedung A";
                } elseif ($kode_awal == "B") {
                    $tempat_tes = "Gedung B";
                } elseif ($kode_awal == "V") {
                    $tempat_tes = "Viktor";
                } else {
                    $tempat_tes = "Tidak Diketahui";
                }

                echo "<tr>
                    <td>{$row['kode']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['jenis_kelamin']}</td>
                    <td>{$row['ttl']}</td>
                    <td>{$row['asal_sekolah']}</td>
                    <td>{$row['pekerjaan_ortu']}</td>
                    <td>{$tempat_tes}</td>
                    <td>{$row['matematika']}</td>
                    <td>{$row['inggris']}</td>
                    <td>{$row['umum']}</td>
                    <td>" . number_format($row['rata_rata'], 2) . "</td>
                    <td>{$row['keterangan']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='12'>Belum ada data pendaftar.</td></tr>";
        }
        ?>
    </table>

    <div class="info">
        <h3>Rekap Data:</h3>
        <p>Jumlah Pendaftar : <b><?php echo $jumlah_pendaftar; ?></b></p>
        <p>Jumlah Peserta Lulus : <b><?php echo $jumlah_lulus; ?></b></p>
        <p>Jumlah Tidak Lulus : <b><?php echo $jumlah_tidak_lulus; ?></b></p>
    </div>

    <div class="info">
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata &ge; 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata &lt; 60 = Tidak Lulus</li>
        </ul>
    </div>

</div>

</body>
</html>