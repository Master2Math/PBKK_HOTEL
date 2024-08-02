<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron mt-5">
            <h1 class="display-4">Selamat Datang Di Aplikasi Perhotelan!</h1>
            <p class="lead">Silahkan Pilih Menu Di Bawah Untuk Melanjutkan:</p>
            <hr class="my-4">
            <div class="row">
               
               
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('customer.index') }}" class="card-link">Customer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('kamar.index') }}" class="card-link">Kamar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('hotel.index') }}" class="card-link">Hotel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('reservasi.index') }}" class="card-link">Reservasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('invoice.index') }}" class="card-link">Invoice</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('pembayaran.index') }}" class="card-link">Pembayaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
