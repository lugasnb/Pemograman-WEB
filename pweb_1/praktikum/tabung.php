<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menghitung Tabung</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 90%;
            max-width: 400px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1rem;
            color: #555;
        }
        input[type="number"], input[type="text"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[readonly] {
            background-color: #e0f7fa;
            color: #00796b;
            border: 1px solid #00acc1;
        }
        .error {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Menghitung Luas dan Volume Tabung</h2>

        <?php
        // Initialize variables
        $jari = $tinggi = $luas = $volume = "";

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jari = $_POST['jari'];
            $tinggi = $_POST['tinggi'];
            if (is_numeric($jari) && $jari > 0 && is_numeric($tinggi) && $tinggi > 0) {
                // Calculate volume and area
                $volume = pi() * pow($jari, 2) * $tinggi;
                $luas = 2 * pi() * $jari * ($jari + $tinggi);
            } else {
                echo "<div class='error'>Harap masukkan angka yang valid dan lebih besar dari nol.</div>";
            }
        }
        ?>

        <form name="form1" method="POST" action="">
            <label for="jari">Jari - Jari</label>
            <input type="number" step="any" name="jari" id="jari" value="<?php echo htmlspecialchars($jari); ?>" required />

            <label for="tinggi">Tinggi</label>
            <input type="number" step="any" name="tinggi" id="tinggi" value="<?php echo htmlspecialchars($tinggi); ?>" required />

            <label for="luas">Luas</label>
            <input type="text" name="luas" id="luas" value="<?php echo $luas ? number_format($luas, 2) : ''; ?>" readonly />

            <label for="volume">Volume</label>
            <input type="text" name="volume" id="volume" value="<?php echo $volume ? number_format($volume, 2) : ''; ?>" readonly />

            <input type="submit" value="Hitung" />
        </form>
    </div>
</body>
</html>
