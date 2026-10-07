<!DOCTYPE html>
<html>
<head>
    <title>Contoh Penggunaan UDF</title>
</head>
<body>
    <!-- Menentukan Form Input -->
    <form method="POST" action="">
        Masukkan Bilangan Pertama : <br>
        <input type="text" name="A" size="10"> <br>
        Masukkan Bilangan Kedua : <br>
        <input type="text" name="B" size="10"> <br><br>
        <input type="submit" name="submit" value="hitung">
    </form>

    <!-- Membandingkan 2 buah bilangan yang diinput -->
    <?php
    if (isset($_POST['submit'])) {
        $A = $_POST["A"];
        $B = $_POST["B"];

        function jumlah($A, $B) {
            $jumlahbil = $A + $B;
            return $jumlahbil;
        }

        function kurang($A, $B) {
            $kurangbil = $A - $B;
            return $kurangbil;
        }

        function kali($A, $B) {
            $kalibil = $A * $B;
            return $kalibil;
        }

        function bagi($A, $B) {
            $bagibil = ($B != 0) ? ($A / $B) : 0;
            return $bagibil;
        }

        echo "<br>";
        echo "Bilangan Pertama : " . $A . "<br>";
        echo "Bilangan Kedua : " . $B . "<br><br>";

        echo "Hasil Penjumlahan 2 buah bilangan <br>";
        $jumlahbil = jumlah($A, $B);
        printf("Penjumlahan antara : %d + %d = %d", $A, $B, $jumlahbil);
        echo "<br><br>";

        echo "Hasil Pengurangan 2 buah bilangan <br>";
        $kurangbil = kurang($A, $B);
        printf("Pengurangan antara : %d - %d = %d", $A, $B, $kurangbil);
        echo "<br><br>";

        echo "Hasil Perkalian 2 buah bilangan <br>";
        $kalibil = kali($A, $B);
        printf("Perkalian antara : %d * %d = %d", $A, $B, $kalibil);
        echo "<br><br>";

        echo "Hasil Pembagian 2 buah bilangan <br>";
        $bagibil = bagi($A, $B);
        printf("Pembagian antara : %d / %d = %.2f", $A, $B, $bagibil);
        echo "<br><br>";
    }
    ?>
</body>
</html>