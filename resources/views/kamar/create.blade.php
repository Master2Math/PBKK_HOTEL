<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data kamar</title>
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
                        <form action="{{ route('kamar.store') }}" method="POST"   >
                          @csrf
                          <!-- BEGIN FORM -->
                          <!-- Nama Kamar -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kamar</label>
                                <input type="text" name="nama_kamar" class="form-control" placeholder="Masukkan Nama Kamar">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('nama_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <!-- Jenis Kamar -->
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kamar</label>
                                <select class="form-control" name="jenis_kamar" id="jenis_kamar">
	                            <option value="">Pilih Kamar</option>
	                            <option value="deluxe">Deluxe</option>
                                <option value="superior">Superior</option>
	                            <option value="president">President</option>
                            </select>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('jenis_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <!-- Ukuran Kamar -->
                              <div class="form-group">
                                <label for="exampleInputEmail1">Ukuran Kamar (Dalam Meter)</label>
                                <input type="number" name="ukuran_kamar" min="1" max="9999999999999" class="form-control" placeholder="Masukkan Ukuran Kamar">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('ukuran_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <!-- Harga -->
                              <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" name="harga" class="form-control" min="1" max="9999999999999" placeholder="Masukkan Harga">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('harga')
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



