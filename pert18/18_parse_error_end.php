<?php
echo "<h3>Kasus 3: Parse error: unexpected \$end</h3>";

/*
// CONTOH KODE PENYEBAB ERROR:
// 1. Kurung kurawal penutup '}' tidak ditulis
if ($a > 1) {
    echo "Nilai A lebih dari 1";

// 2. Mencampur tag pembuka '<?php' dengan short tag '<?' pada blok yang terpecah
*/

// SOLUSI: Pastikan setiap '{' ditutup dengan '}' dan konsisten memakai '<?php'
$a = 5;
if ($a > 1) {
    echo "Nilai A ($a) lebih dari 1. Blok kurung kurawal sudah ditutup dengan benar.";
}
?>