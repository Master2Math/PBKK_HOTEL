<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Invoice Hotel</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('invoice.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Status Bayar</th>
                                    <th scope="col">Besar DP</th>
                                    <th scope="col">Kode Invoice</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datainvoice as $index => $invoice)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $invoice->deskripsi}}</td>
                                        <td>{{ $invoice->status}}</td>
                                        <td>{{ $invoice->tanggal}}</td>
                                        <td>{{ $invoice->besar_dp }}</td>
                                        <td>{{ $invoice->id_invoice }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('invoice.destroy', $invoice->id) }}" method="POST">
                                                <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Invoice Hotel Belum Ada.
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



