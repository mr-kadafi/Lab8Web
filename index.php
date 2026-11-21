<?php
include("koneksi.php");

// Query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
    <div class="container">
        <h1>Data Barang</h1>

        <div class="main">

            <!-- Tombol Tambah Barang -->
            <a href="tambah.php" class="btn btn-primary">Tambah Barang</a>

            <br><br>

            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>

                <?php if ($result && mysqli_num_rows($result) > 0): ?>

                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td>
                                <img
                                    src="gambar/<?= htmlspecialchars($row['gambar']); ?>"
                                    alt="<?= htmlspecialchars($row['nama']); ?>">
                            </td>

                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['kategori']); ?></td>
                            <td><?= htmlspecialchars($row['harga_jual']); ?></td>
                            <td><?= htmlspecialchars($row['harga_beli']); ?></td>
                            <td><?= htmlspecialchars($row['stok']); ?></td>

                            <td>
                                <a href="ubah.php?id=<?= $row['id_barang']; ?>"
                                    class="btn btn-edit">Ubah</a>

                                <a href="hapus.php?id=<?= $row['id_barang']; ?>"
                                    class="btn btn-delete"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>
    </div>
</body>

</html>