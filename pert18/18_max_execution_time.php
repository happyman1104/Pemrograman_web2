<?php
echo "<h3>Kasus 5: Fatal error: Maximum execution time exceeded</h3>";
echo "Batas waktu eksekusi default server saat ini: <b>" . ini_get('max_execution_time') . " detik</b><br><br>";

/*
// CONTOH KODE PENYEBAB ERROR (Infinite loop):
set_time_limit(3); // Simulasi batas 3 detik
$i = 1;
while ($i > 0) {
    $i++;
}
*/

// SOLUSI: Perbaiki logika algoritma agar perulangan memiliki batas berhenti yang jelas
$i = 1;
while ($i <= 5) {
    echo "Iterasi efisien ke-$i <br>";
    $i++;
}

echo "<p><i>Catatan php.ini: Jika memang memproses data besar yang membutuhkan waktu lama, ubah <code>max_execution_time = 9999</code> pada php.ini lalu restart Apache.</i></p>";
?>