<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Kamar Hotel</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('hotel.store') }}" method="POST"   >
                          @csrf
                          <!-- BEGIN FORM -->
                          <!-- HARGA -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">HARGA</label>
                                <input type="text" name="harga" class="form-control" placeholder="Masukkan HARGA">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <!-- available_room -->
                              <div class="form-group">
                                <label for="exampleInputEmail1">Kamar Tersedia</label>
                                <input type="number" name="available_room" class="form-control" placeholder="Masukkan Jumlah Kamar Tersedia">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('available_room')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <!-- Tanggal -->
                               <!-- TANGGAL -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" required>
                                <small id="tanggalHelp" class="form-text text-muted">Pilih tanggal yang sesuai.</small>
                                @error('tanggal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                               <!-- ID Kamar -->
                                <!-- Nama Kamar-->
                            <div class="form-group">
                                <label for="available_room">Nama Kamar</label>
                                <select class="form-control" name="id_kamar" id="exampleFormControlSelect1">
                             @foreach ($kamar as $data_kamar)
                             <option value="{{ $data_kamar->id }}">{{ $data_kamar->nama_kamar }}</option>
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



