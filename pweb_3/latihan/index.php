<?php

echo "<strong>Pengulangan (Loop)</strong> <br>";
echo "<br>";

echo "<strong>Latihan 1: Mencetak Bilangan 1-10 Menggunakan while</strong><br>";
$i = 1;
while ($i <= 10) {
    echo $i . " ";
    $i++;
}
echo "<br><br>";

echo "<strong>Latihan 2: Menghitung Jumlah Angka Menggunakan for</strong><br>";
$jumlah = 0;
for ($i = 1; $i <= 10; $i++) {
    $jumlah += $i;
}
echo "Jumlah dari 1 hingga 10 adalah: " . $jumlah;
echo "<br><br>";

echo "<strong>Latihan 3: Menampilkan Elemen Array Menggunakan foreach</strong><br>";
$buah = ["Apel", "Jeruk", "Mangga", "Anggur"];
foreach ($buah as $item) {
    echo $item . "<br>";
}
echo "<br>";

echo "<strong>Latihan 4: Menampilkan Tabel Perkalian 5 Menggunakan for</strong><br>";
for ($i = 1; $i <= 10; $i++) {
    echo "5 x $i = " . (5 * $i) . "<br>";
}
echo "<br><br>";

echo "<strong>Latihan Menggunakan break dan continue</strong><br>";
echo "<br>";

echo "<strong>Latihan 1: Menemukan Bilangan Genap dengan continue</strong><br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo $i . " ";
}
echo "<br><br>";

echo "<strong>Latihan 2: Mencari Angka Pertama yang Dapat Dibagi 7 Menggunakan break</strong><br>";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 7 == 0) {
        echo "Angka pertama yang bisa dibagi 7 adalah: " . $i;
        break;
    }
}
echo "<br>";
?>