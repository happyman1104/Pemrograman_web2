<?php
echo "<h3>Kasus 4: Notice: Undefined variable &amp; Undefined index</h3>";

/*
// CONTOH KODE PENYEBAB NOTICE/WARNING:
if ($variabel_belum_ada > 0) { ... }
if ($_GET['test'] == 0) { ... }
*/

// SOLUSI 1 (Secara Kode): Definisikan variabel lebih dulu dan gunakan isset() untuk $_GET
$a = 10;
if ($a > 0) {
    echo "Variabel \$a sudah didefinisikan dengan nilai: <b>$a</b><br>";
}

if (isset($_GET['test'])) {
    if ($_GET['test'] == 0) {
        echo "Parameter URL <code>?test=0</code> terdeteksi dan bernilai 0.<br>";
    } else {
        echo "Parameter URL <code>test</code> bernilai: " . htmlspecialchars($_GET['test']) . "<br>";
    }
} else {
    echo "Parameter URL <code>test</code> belum dikirim (aman tanpa Notice karena memakai <code>isset()</code>).<br>";
}

echo "<br>Uji parameter GET: <a href='?test=0'>Klik kirim ?test=0</a> | <a href='18_notice_undefined.php'>Reset URL</a>";
echo "<p><i>Catatan php.ini: Untuk menyembunyikan Notice di level server, atur <code>error_reporting = E_ALL &amp; ~E_NOTICE</code> lalu restart Apache.</i></p>";
?>