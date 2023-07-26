<?php
session_start();

//  data transaksi dari form jika tombol submit ditekan
if (isset($_POST['submit_add'])) {
    $transaction = array(
        'date' => $_POST['date'],
        'description' => $_POST['description'],
        'total' => $_POST['total']
    );

    // Angka pakah transaksi adalah pengeluaran atau pemasukan
    if (substr($transaction['total'], 0, 1) === '-') {
        $transaction['type'] = 'pengeluaran';
    } else {
        $transaction['type'] = 'pemasukan';
    }

    // hapus tanda '-' di depan angka
    $transaction['total'] = abs($transaction['total']);

    // Menambahkan data transaksi ke dalam session
    $_SESSION['transactions'][] = $transaction;

    // Menampilkan pesan "Data telah tertambahkan ke tabel"
    echo "Data telah tertambahkan ke tabel.";
}

// Menampilkan semua transaksi
if (isset($_POST['see_all_transactions'])) {
    echo "<h2>Semua Transaksi</h2>";
    if (empty($_SESSION['transactions'])) {
        echo "Belum ada transaksi yang ditambahkan.";
    } else {
        echo "<table>";
        echo "<thead><tr><th>Tanggal</th><th>Deskripsi</th><th>Total</th><th>Jenis</th></tr></thead>";
        echo "<tbody>";
        foreach ($_SESSION['transactions'] as $transaction) {
            echo "<tr>";
            echo "<td>" . $transaction['date'] . "</td>";
            echo "<td>" . $transaction['description'] . "</td>";
            echo "<td>" . $transaction['total'] . "</td>";
            echo "<td>" . $transaction['type'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<br>";
    }
}

// Menghitung total saldo
if (isset($_POST['calculate_total_balance'])) {
    $totalBalance = 0;
    foreach ($_SESSION['transactions'] as $transaction) {
        if ($transaction['type'] === 'pemasukan') {
            $totalBalance += $transaction['total'];
        } else {
            $totalBalance -= $transaction['total'];
        }
    }
    echo "<h2>Total Saldo</h2>";
    echo "Total Saldo: " . $totalBalance;
}
?>