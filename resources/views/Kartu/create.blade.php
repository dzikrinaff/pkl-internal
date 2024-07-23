@extends('layouts.include.frontend.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('kartu.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('kartu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Nama kartu</label>
                            <input type="text" class="form-control @error('nama_kartu') is-invalid @enderror" name="nama_kartu"
                                value="{{ old('nama_kartu') }}" placeholder="nama kartu" required>
                            @error('nama_kartu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">total</label>
                            <input type="text" class="form-control @error('total') is-invalid @enderror" name="total"
                                value="{{ old('total') }}" placeholder="total"  >
                            @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">keterangan</label>
                            <textarea class="form-control" class="form-control @error('no') is-invalid @enderror"
                                name="no" value="{{ old('no') }}" rows="3" placeholder="no"
                                required></textarea>
                            @error('no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{route('home')}}" class="btn btn-sm btn-warning">kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
