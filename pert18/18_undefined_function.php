<?php
echo "<h3>Kasus 2: Fatal error: Call to undefined function</h3>";

// SOLUSI: Pastikan file function sudah di-include sebelum fungsi dipanggil.
// (Beri komentar '//' pada baris include di bawah ini jika ingin memicu Fatal error)
include "18_function.php";

echo "Hasil pemanggilan fungsi jumlah(9, 10) = <b>" . jumlah(9, 10) . "</b>";
?>