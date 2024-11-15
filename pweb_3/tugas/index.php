<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktorial</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f0f0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: scale(1.05);
        }
        .title {
            font-size: 26px;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }
        .input-form {
            margin-top: 20px;
            text-align: left;
        }
        .input-form label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }
        .input-form input[type="number"] {
            padding: 8px;
            font-size: 16px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ddd;
            width: 100%;
        }
        .result-input {
            font-size: 18px;
            color: #333;
            margin: 15px 0;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: 100%;
            text-align: center;
            background-color: #E0F7FA;
        }
        .input-form button {
            background: #388E3C;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
            box-sizing: border-box;
            margin-top: 20px;
        }
        .input-form button:hover {
            background: #2E7D32;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Kalkulator Faktorial</div>
    <div class="input-form">
        <form method="POST" action="">
            <label for="number">Masukan Angka:</label>
            <input type="number" id="number" name="number" min="0" required>
            <?php
                $resultText = "Result will be shown here";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $n = intval($_POST["number"]);
                    function factorialWithFormula($num) {
                        if ($num === 0) {
                            return "0! = 1";
                        }
                        $result = 1;
                        $formula = "";
                        for ($i = $num; $i > 0; $i--) {
                            $result *= $i;
                            $formula .= $i . ($i > 1 ? " × " : " = ");
                        }
                        $formula .= $result;
                        return "$num! = " . $formula;
                    }
                    $resultText = factorialWithFormula($n);
                }
            ?>
            <input type="text" class="result-input" value="<?php echo $resultText; ?>" disabled>
            <button type="submit">Hitung Faktorial</button>
        </form>
    </div>
</div>

</body>
</html>
