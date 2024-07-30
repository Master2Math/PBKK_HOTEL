<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pembayaran</title>
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
                        <form action="{{ route('pembayaran.store') }}" method="POST"   >
                          @csrf
                          <!-- BEGIN FORM -->
                          <!-- customer_id -->
                          <div class="form-group">
                                <label for="available_room">Nama Customer</label>
                                <select class="form-control" name="customer_id" id="exampleFormControlSelect1">
                             @foreach ($customer as $data_customer)
                             <option value="{{ $data_customer->id }}">{{ $data_customer->nama_customer }}</option>
                             @endforeach
                                </select>
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
                                <label for="tanggal">Tanggal Bayar</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Pilih Tanggal" required>
                                <small id="tanggalHelp" class="form-text text-muted">Pilih tanggal yang sesuai.</small>
                                @error('tanggal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                           <!-- Metode Bayar -->
<div class="form-group">
    <label for="exampleMetodeBayar">Metode Bayar</label>
    <select name="metode_bayar" class="form-control" id="exampleMetodeBayar">
        <option value="cash">Cash</option>
        <option value="transfer">Transfer</option>
    </select>
    <small id="statusHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    @error('metode_bayar')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
</div>

                              
                               <!-- ID Invoice -->
                                <!-- Status Pembayaran-->
                                <div class="form-group">
                                <label for="id_invoice">Jumlah Pembayaran</label>
                                <select class="form-control" name="id_invoice" id="exampleFormControlSelect1">
                             @foreach ($invoice as $data_invoice)
                             <option value="{{ $data_invoice->id }}">{{ $data_invoice->besar_dp }}</option>
                             @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('id_invoice')
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



