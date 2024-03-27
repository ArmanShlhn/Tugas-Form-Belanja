<!DOCTYPE html>
<html>
<head>
    <title>Form Belanja Barang Elektronik</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 30%;
            border: 1px solid #ccc; 
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        label, input, select, input[type="submit"] {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            display: block;
        }

        input[type="submit"] {
            width: 100%; 
            padding: 10px 20px;
            background-color: #64a0e4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4d5ac9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Arman Elektronik</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" required><br>
            
            <label for="produk">Produk Pilihan</label>
            <select name="produk" id="produk" required>
                <option value="">Pilih Produk</option>
                <option value="TV">TV</option>
                <option value="Kulkas">Kulkas</option>
                <option value="AC">AC</option>
            </select><br>
            
            <label for="jumlah_beli">Jumlah Produk</label>
            <input type="text" name="jumlah_beli" id="jumlah_beli" required><br>
            
            <input type="submit" name="submit" value="Beli">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $produk = $_POST['produk'];
        $jumlah_beli = $_POST['jumlah_beli'];

        if ($produk == 'TV') {
            $harga_satuan = 2000000;
        } elseif ($produk == 'Kulkas') {
            $harga_satuan = 4000000;
        } elseif ($produk == 'AC') {
            $harga_satuan = 3000000;
        }

        $total_belanja = $jumlah_beli * $harga_satuan;

        $diskon = 0.2 * $total_belanja;

        $ppn = 0.1 * ($total_belanja - $diskon);

        $harga_bersih = ($total_belanja - $diskon) + $ppn;

        echo "<script>";
        echo "Swal.fire({";
        echo "title: 'Rincian Belanja',";
        echo "html: 'Nama Pelanggan: $nama_pelanggan <br>' +";
        echo "'Produk: $produk <br>' +";
        echo "'Jumlah Beli: $jumlah_beli <br>' +";
        echo "'Harga Satuan: " . number_format($harga_satuan, 0, ',', '.') . " IDR <br>' +";
        echo "'Total Belanja: " . number_format($total_belanja, 0, ',', '.') . " IDR <br>' +";
        echo "'Diskon: " . number_format($diskon, 0, ',', '.') . " IDR <br>' +";
        echo "'PPN: " . number_format($ppn, 0, ',', '.') . " IDR <br>' +";
        echo "'Harga Bersih: " . number_format($harga_bersih, 0, ',', '.') . " IDR',";
        echo "})";
        echo "</script>";
    }
    ?>
</body>
</html>
