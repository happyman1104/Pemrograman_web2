<?php
echo "<h3>Kasus 1: Parse error: syntax error, unexpected T_ELSE</h3>";

/*
// CONTOH KODE PENYEBAB ERROR (Hapus tanda komentar untuk menguji error):
// Kesalahan: Tidak ada titik koma (;) dan kurang kata kunci 'if' setelah 'else'
$a = 5;
if ($a > 0) $status = "A lebih besar dari 0"
else ($a < 0) $status = "A lebih kecil dari 0"
else $status = "A sama dengan 0"
*/

// SOLUSI 1: Penulisan sebaris dengan ';' dan 'else if'
$a = 5;
if ($a > 0) $status = "A lebih besar dari 0";
else if ($a < 0) $status = "A lebih kecil dari 0";
else $status = "A sama dengan 0";

echo "Hasil Solusi 1 (\$a = $a): <b>$status</b><br><br>";

// SOLUSI 2: Menggunakan blok kurung kurawal { }
$b = -3;
if ($b > 0) {
    $statusB = "B lebih besar dari 0";
} else if ($b < 0) {
    $statusB = "B lebih kecil dari 0";
} else {
    $statusB = "B sama dengan 0";
}

echo "Hasil Solusi 2 (\$b = $b): <b>$statusB</b>";
?>