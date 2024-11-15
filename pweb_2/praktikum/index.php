<?php
$tIstri = 0; // Tunjangan Istri
$tAnak = 0;
$total = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gaji = $_POST['gajiPokok'];
    $status = $_POST['status'];
    $jAnak = $_POST['jumlahAnak'];
    
    // Tunjangan berdasarkan status
    if ($status == 'menikah' || $status == 'janda') {
        $tIstri = 0.1 * $gaji; // Tunjangan untuk menikah dan janda
    }
    
    if ($jAnak > 0) {
        $tAnak = 0.05 * $gaji * $jAnak;
    }

    // Total penghasilan
    $total = $gaji + $tIstri + $tAnak;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4; /* Light background for the page */
            padding: 20px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .container {
            background-color: #fff; /* White background for the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 30px; /* Padding around the content */
        }
        .full-width-button {
            width: 100%;
            margin-top: 20px;
            background-color:#00796b; /* Bootstrap primary color */
            border: none;
        }
        .full-width-button:hover {
            background-color: #4CAF50; /* Darker on hover */
        }
        .result-input {
            background-color: #e0f7fa;
            color: #00796b;
            border: 1px solid #00acc1;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 1rem;
            color: #555;
        }
    </style>
    <title>Hitung Tunjangan</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Menghitung Tunjangan Istri dan Anak</h2>
        <form method="post">
            <div class="form-group">
                <label for="gajiPokok">Gaji Pokok:</label>
                <input type="number" class="form-control" id="gajiPokok" name="gajiPokok" required>
            </div>
            <div class="form-group">
                <label>Status Pernikahan:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="menikah" value="menikah" required onclick="updateLabel()">
                    <label class="form-check-label" for="menikah">Menikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="duda" value="duda" onclick="updateLabel()">
                    <label class="form-check-label" for="duda">Duda</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="janda" value="janda" onclick="updateLabel()">
                    <label class="form-check-label" for="janda">Janda</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="single" value="single" onclick="updateLabel()">
                    <label class="form-check-label" for="single">Single</label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlahAnak">Jumlah Anak ( < 18 thn):</label>
                <input type="number" class="form-control" id="jumlahAnak" name="jumlahAnak" value="0" min="0" required>
            </div>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <h4 class="mt-4">Hasil Perhitungan:</h4>
                <div class="form-group">
                    <label id="tunjanganIstriLabel">Tunjangan Istri:</label>
                    <input type="text" class="form-control result-input" value="<?php echo number_format($tIstri, 2, ',', '.'); ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Tunjangan Anak:</label>
                    <input type="text" class="form-control result-input" value="<?php echo number_format($tAnak, 2, ',', '.'); ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Total Penghasilan:</label>
                    <input type="text" class="form-control result-input" value="<?php echo number_format($total, 2, ',', '.'); ?>" disabled>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn full-width-button">Hitung</button>
        </form>
    </div>

    <script>
        function updateLabel() {
            const status = document.querySelector('input[name="status"]:checked').value;
            const label = document.getElementById('tunjanganIstriLabel');
            if (status === 'duda') {
                label.textContent = 'Tunjangan Duda:';
            } else if (status === 'janda') {
                label.textContent = 'Tunjangan Janda:';
            } else if (status === 'single') {
                label.textContent = 'Tunjangan:';
            } else {
                label.textContent = 'Tunjangan Istri:';
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
