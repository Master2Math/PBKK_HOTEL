<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Data Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pembayaran</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="card-body">
                            <h3>Nama Customer : {{ $pembayaran->customer->nama_customer}}</h3>
                            <h3>Tanggal Bayar: {{ $pembayaran->tanggal}}</h3>  
                            <h3>Metode Pembayaran : {{ $pembayaran->metode_bayar}}</h3>
                            <h3>Jumlah Pembayaran : Rp {{ number_format($pembayaran->invoice->besar_dp, 0, ',', '.') }}</h3>                        

                           
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



