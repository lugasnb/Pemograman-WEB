<!DOCTYPE html>
<html lang="en">
<head>
    <title>Konversi Suhu</title>
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
        <h2>Konversi Suhu Celsius</h2>

        <?php
        // Inisialisasi variabel
        $celsius = $fahrenheit = $reamur = $kelvin = "";

        // Cek apakah form telah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $celsius = $_POST['celsius'];
            if (is_numeric($celsius)) {
                // Konversi suhu
                $fahrenheit = ($celsius * 9/5) + 32;
                $reamur = $celsius * 4/5;
                $kelvin = $celsius + 273.15;
            } else {
                echo "<div class='error'>Harap masukkan angka yang valid.</div>";
            }
        }
        ?>

        <form name="form1" method="POST" action="">
            <label for="celsius">Celsius</label>
            <input type="number" step="any" name="celsius" id="celsius" value="<?php echo htmlspecialchars($celsius); ?>" required />

            <label for="fahrenheit">Fahrenheit</label>
            <input type="text" name="fahrenheit" id="fahrenheit" value="<?php echo $fahrenheit ? number_format($fahrenheit, 2) : ''; ?>" readonly />

            <label for="reamur">Reamur</label>
            <input type="text" name="reamur" id="reamur" value="<?php echo $reamur ? number_format($reamur, 2) : ''; ?>" readonly />

            <label for="kelvin">Kelvin</label>
            <input type="text" name="kelvin" id="kelvin" value="<?php echo $kelvin ? number_format($kelvin, 2) : ''; ?>" readonly />

            <input type="submit" value="Konversi" />
        </form>
    </div>
</body>
</html>
