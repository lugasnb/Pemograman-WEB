<?php
// Array untuk menyimpan daftar barang dan kuantitas
$barang = array(
  "Buku Tulis" => 85,
  "Spidol" => 70,
  "Pulpen" => 100
);

// Fungsi untuk menambah barang
function tambahbarang($nama, $kuantitas) {
  global $barang;
  $barang[$nama] = $kuantitas;
}

// Fungsi untuk menghapus barang
function hapusbarang($nama) {
  global $barang;
  if (isset($barang[$nama])) {
    unset($barang[$nama]);
  } else {
    echo "Barang tidak ditemukan.<br>";
  }
}

// Fungsi untuk memperbarui kuantitas barang
function updatekuantitas($nama, $kuantitasBaru) {
  global $barang;
  if (isset($barang[$nama])) {
    $barang[$nama] = $kuantitasBaru;
  } else {
    echo "Barang tidak ditemukan.<br>";
  }
}

// Menampilkan daftar barang
function tampilkanbarang() {
  global $barang;
  echo "<div class='daftar-barang'>";
  echo "<h3>Daftar Barang:</h3>";
  foreach ($barang as $nama => $kuantitas) {
    echo "<p>Barang: $nama, Kuantitas: " . number_format($kuantitas, 0, ',', '.') . "</p>";
  }
  echo "</div>";
}

// Cek apakah ada input dari pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['tambah'])) {
    tambahbarang($_POST['barang'], $_POST['kuantitas']);
  } elseif (isset($_POST['hapus'])) {
    hapusbarang($_POST['barang']);
  } elseif (isset($_POST['update'])) {
    updatekuantitas($_POST['barang'], $_POST['kuantitas']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Kuantitas Barang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <?php tampilkanbarang(); ?>
    
    <form method="POST" class="tambah-barang">
      <h3>Tambah Barang Baru</h3>
      <label for="barang">Nama Barang:</label>
      <input type="text" id="barang" name="barang" required>
      <label for="kuantitas">Kuantitas Barang:</label>
      <input type="number" id="kuantitas" name="kuantitas" required>
      <button type="submit" name="tambah">Tambah Barang</button>
    </form>

    <form method="POST" class="hapus-barang">
      <h3>Hapus Barang</h3>
      <label for="barang">Nama Barang:</label>
      <input type="text" id="barang" name="barang" required>
      <button type="submit" name="hapus">Hapus Barang</button>
    </form>

    <form method="POST" class="update-barang">
      <h3>Update Kuantitas Barang</h3>
      <label for="barang">Nama Barang:</label>
      <input type="text" id="barang" name="barang" required>
      <label for="kuantitas">Kuantitas Baru:</label>
      <input type="number" id="kuantitas" name="kuantitas" required>
      <button type="submit" name="update">Update Kuantitas</button>
    </form>
  </div>
</body>
</html>
