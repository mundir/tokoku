<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url('logofamili/favicon.ico'); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Selamat Datang di Familimart</title>
    <meta content="Memberi kemudahan bagi masyarakat sekitar untuk belanja kebutuhan sehari-hari secara lebih mudah, lebih murah dan lebih ramah" name="description" />

    <link href="//db.onlinewebfonts.com/c/c455d94eee43dc4ceeb83c0c0fd0d4c8?family=Segoe+Print" rel="stylesheet" type="text/css" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            background-color: #17a2b8;
        }

        .full-height {
            max-width: 421px;
            min-height: 640px;
            height: 100%;
            padding-top: 2rem;
            position: relative;
        }

        .f-segoe {
            font-family: 'segoe print';
            font-weight: bold;
        }

        .bawah {
            position: absolute;
            width: 100%;
            bottom: 10px;
        }
    </style>

</head>

<body>
    <div class="card full-height mx-auto">
        <div class="text-center pt-5">
            <p class="f-segoe text-success">Selamat datang di</p>
        </div>
        <img src="<?= base_url('logofamili/cart.jpg'); ?>" style="width: 32%;" class="mx-auto d-block" alt="...">
        <img src="<?= base_url('logofamili/logo_hijau_283.jpg'); ?>" class="mx-auto d-block mt-3" alt="...">
        <div class="text-center mt-4 px-5">
            <p class="text-success">Memberi kemudahan
                bagi masyarakat sekitar
                untuk belanja kebutuhan
                secara lebih mudah, lebih murah
                dan lebih ramah</p>
        </div>
        <p class="text-center mt-5">
            <span class="text-muted"><em>Bantuan WA 081249565788 </em></span><a class="text-danger" href="https://wa.me/6281249565788?text=Amanahjaya%0ASaya%20ingin%20dibantu%20untuk%20registrasi%20nomor%20WA%20ini"><strong> Klik Disini </strong></a>

        </p>
        <div class="bawah d-flex p-2">
            <a href="<?= base_url('auth/login'); ?>" class="btn btn-outline-success btn-lg flex-fill mr-2">LOGIN</a>
            <a href="<?= base_url('auth/regis'); ?>" class="btn btn-outline-danger btn-lg flex-fill" style="overflow: hidden;">REGISTRASI</a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>