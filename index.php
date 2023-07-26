<?php include 'process.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Sistem Keuangan Sekolah
    </title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        .button-container {
            display: inline-block;
        }
        .button-container form {
            display: inline;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Sistem Keuangan Sekolah</h1>
    <form action="" method="POST">
        <input type="date" name="date" required>
        <input type="text" name="description" placeholder="description" required>
        <input type="number" name="total" placeholder="total" required>
        <button type="submit" name="submit_add">Tambahkan Transaksi Baru</button>
    </form>

    <div class="button-container">
        <form action="" method="POST">
            <button type="submit" name="see_all_transactions">Lihat Semua Transaksi</button>
        </form>
    </div>

    <div class="button-container">
        <form action="" method="POST">
            <button type="submit" name="calculate_total_balance">Hitung Total Saldo</button>
        </form>
    </div>
</body>
</html>




