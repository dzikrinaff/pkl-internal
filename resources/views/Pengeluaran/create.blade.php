@extends('layouts.include.frontend.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Pengelaran') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('pengeluaran.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">jumlah pengeluaran</label>
                            <input type="number" min="0"   class="form-control @error('jumlah_pengeluaran') is-invalid @enderror" name="jumlah_pengeluaran"
                                 placeholder="jumlah pengeluaran" required>
                            @error('jumlah_pengeluaran')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                 placeholder="deskripsi" required>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Pilih kartu</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select class="form-control" name="id_kartu">
                                    @foreach ($kartu as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kartu }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>




                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
