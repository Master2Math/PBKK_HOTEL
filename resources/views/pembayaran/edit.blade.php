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
                        <form action="{{ route('pembayaran.update', $datapembayaran->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          
                          <!-- BEGIN FORM -->

                          <!-- customer_id -->
                          <div class="form-group">
                              <label for="customer_id">Nama Customer</label>
                              <select class="form-control" name="customer_id" id="customer_id">
                                  @foreach ($customer as $data_customer)
                                      <option value="{{ $data_customer->id }}" {{ $datapembayaran->customer_id == $data_customer->id ? 'selected' : '' }}>
                                          {{ $data_customer->nama_customer }}
                                      </option>
                                  @endforeach
                              </select>
                              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                              @error('customer_id')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <!-- Tanggal -->
                          <div class="form-group">
                              <label for="tanggal">Tanggal Bayar</label>
                              <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $datapembayaran->tanggal }}" required>
                              <small class="form-text text-muted">Pilih tanggal yang sesuai.</small>
                              @error('tanggal')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <!-- Metode Bayar -->
                          <div class="form-group">
                              <label for="metode_bayar">Metode Bayar</label>
                              <select name="metode_bayar" class="form-control" id="metode_bayar">
                                  <option value="cash" {{ $datapembayaran->metode_bayar == 'cash' ? 'selected' : '' }}>Cash</option>
                                  <option value="transfer" {{ $datapembayaran->metode_bayar == 'transfer' ? 'selected' : '' }}>Transfer</option>
                              </select>
                              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                              @error('metode_bayar')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <!-- ID Invoice -->
                          <div class="form-group">
                              <label for="id_invoice">Jumlah Bayar</label>
                              <select class="form-control" name="id_invoice" id="id_invoice">
                                  @foreach ($invoice as $data_invoice)
                                      <option value="{{ $data_invoice->id }}" {{ $datapembayaran->id_invoice == $data_invoice->id ? 'selected' : '' }}>
                                          {{ $data_invoice->besar_dp }}
                                      </option>
                                  @endforeach
                              </select>
                              @error('id_invoice')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
