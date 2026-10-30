<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
$sql = "DELETE FROM tbl_mhs WHERE LastName='Prabowo'";

if (mysqli_query($con, $sql)) {
    echo "Data berhasil dihapus. Baris terpengaruh: " . mysqli_affected_rows($con);
} else {
    echo "Gagal menghapus data: " . mysqli_error($con);
}
mysqli_close($con);
?>