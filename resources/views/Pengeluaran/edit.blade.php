@extends('layouts.include.frontend.admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Kartu
                    <a href="{{route('pengeluaran.index')}}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('pengeluaran.update', $pengeluaran->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                <div class="mb-2">
                                    <label for="">Jumlah Pengeluaran</label>
                                    <input type="number" class="form-control @error('jumlah_pengeluaran') is-invalid @enderror"
                                        name="jumlah_pengeluaran">
                                    @error('jumlah_pengeluaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        name="deskripsi">
                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="">nama Kartu</label>
                                    <select name="id_kartu" class="form-control @error('id_kartu') is-invalid @enderror">
                                        <option class="form-control" selected disabled>Pilih Kartu</option>
                                        @foreach ($kartu as $data)
                                            <option class="form-control" value="{{ $data->id }}">{{ $data->nama_kartu }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_kartu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                        <div class="mb-2">
                            <button class="btn btn-sm btn-success" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
