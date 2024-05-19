<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Kamar</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="card-body">
                            <h3>Nama Kamar : {{ $kamar->nama_kamar }}</h3>
                            <h3>Jenis Kamar : {{ $kamar->jenis_kamar}}</h3>
                            <h3>Ukuran kamar : {{ $kamar->ukuran_kamar}}</h3>
                            <h3>Harga : {{ $kamar->harga}}</h3>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



