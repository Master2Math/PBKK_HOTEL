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
                    <h3 class="text-center my-4">Data Invoice</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('invoice.update', $datainvoice->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                         <!-- BEGIN FORM -->

    <!-- Deskripsi Text -->
    <div class="form-group">
        <label for="exampleInputEmail1">DESKRIPSI</label>
        <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" value="{{ old('deskripsi', $datainvoice->deskripsi) }}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('deskripsi')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Status Bayar -->
    <div class="form-group">
        <label for="exampleStatusBayar">Status Bayar</label>
        <select name="status" class="form-control" id="exampleStatusBayar">
            <option value="bayar" {{ old('status', $datainvoice->status) == 'bayar' ? 'selected' : '' }}>Bayar</option>
            <option value="dp" {{ old('status', $datainvoice->status) == 'dp' ? 'selected' : '' }}>DP</option>
            <option value="lunas" {{ old('status', $datainvoice->status) == 'lunas' ? 'selected' : '' }}>Lunas</option>
        </select>
        <small id="statusHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('status')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Besar DP -->
    <div class="form-group">
        <label for="exampleInputEmail1">Besar DP</label>
        <input type="number" name="besar_dp" class="form-control" placeholder="Masukkan Besar DP" value="{{ old('besar_dp', $datainvoice->besar_dp) }}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('besar_dp')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- ID Reservasi -->
    <div class="form-group">
        <label for="available_room">Tanggal Booking</label>
        <select class="form-control" name="id_reservasi" id="exampleFormControlSelect1">
            @foreach ($reservasi as $data_reservasi)
                <option value="{{ $data_reservasi->id }}" {{ old('id_reservasi', $datainvoice->id_reservasi) == $data_reservasi->id ? 'selected' : '' }}>{{ $data_reservasi->tanggal }}</option>
            @endforeach
        </select>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('available_room')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
    </div>

                              <!-- END -->

                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
           
                        
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



