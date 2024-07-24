<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Reservasi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('reservasi.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Customer</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tanggal Mulai (Check In)</th>
                                    <th scope="col">Tanggal Akhir (Check Out)</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datareservasi as $index => $reservasi)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $reservasi->customer->nama_customer}}</td>
                                        <td>{{ $reservasi->tanggal}}</td>
                                        <td>{{ $reservasi->tanggal_mulai}}</td>
                                        <td>{{ $reservasi->tanggal_akhir }}</td>
                                        <td>{{ $reservasi->hotel->harga }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST">
                                                <a href="{{ route('reservasi.show', $reservasi->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Reservasi Belum Ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



