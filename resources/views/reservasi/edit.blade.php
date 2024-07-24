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
                        <form action="{{ route('reservasi.update', $datareservasi->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <form action="{{ route('reservasi.update', $datareservasi->id) }}" method="POST">

                          <!-- BEGIN FORM -->
    @csrf
    @method('PUT')
    
    <!-- Nama Customer -->
    <div class="form-group">
        <label for="customer_id">Nama Customer</label>
        <select class="form-control" name="customer_id" id="customer_id">
            @foreach ($customer as $customer)
                <option value="{{ $customer->id }}" {{ $datareservasi->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->nama_customer }}
                </option>
            @endforeach
        </select>
        @error('customer_id')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <!-- Tanggal -->
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $datareservasi->tanggal }}" required>
        @error('tanggal')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <!-- Tanggal Mulai -->
    <div class="form-group">
        <label for="tanggal_mulai">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ $datareservasi->tanggal_mulai }}" required>
        @error('tanggal_mulai')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <!-- Tanggal Akhir -->
    <div class="form-group">
        <label for="tanggal_akhir">Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ $datareservasi->tanggal_akhir }}" required>
        @error('tanggal_akhir')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <!-- Harga Kamar -->
    <div class="form-group">
        <label for="id_hotel">Harga Kamar</label>
        <select class="form-control" name="id_hotel" id="id_hotel">
            @foreach ($hotel as $hotel)
                <option value="{{ $hotel->id }}" {{ $datareservasi->id_hotel == $hotel->id ? 'selected' : '' }}>
                    {{ $hotel->harga }}
                </option>
            @endforeach
        </select>
        @error('id_hotel')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>

<!-- END FORM -->


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



