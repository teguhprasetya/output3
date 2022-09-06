<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Output 3 Form</title>
</head>

<body class="pt-5">
    <div class="container d-flex justify-content-center text-light bg-primary w-25 shadow rounded p-3">
        <form action="" method="POST" enctype="multipart/form-data">
            <h5 class="text-center">Pilih gambar yang akan ditampilkan</h5>
            <br>
            <input class="form-control" type="file" name="gambar">
            <br>
            <input class="form-control btn btn-light" type="submit" value="Kirim" name="submit">
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($error > 0) {
            echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
        } else {
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo "<script>
            alert('Masukkan gambar yang sesuai!!!');
            </script>";
                return false;
            } else {
                if ($ukuranFile > 10000000) {
                    echo "<script>
                alert('Ukuran gambar terlalu besar!');
                </script>";
                    return false;
                } else {
                    echo "<div class='d-flex justify-content-center mt-5'>";
                    echo "<img src='assets/{$namaFile}' class='w-25 d-flex justify-content-center rounded'>";
                    echo "</div>";

                    move_uploaded_file($tmpName, 'assets/' . $namaFile);
                    return true;
                }
            }
        }
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>