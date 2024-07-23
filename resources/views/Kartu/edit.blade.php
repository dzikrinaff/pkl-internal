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
                    <form action="{{ route('kartu.update', $kartu->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">nama_kartu </label>
                            <input type="text" class="form-control @error('nama_kartu') is-invalid @enderror" name="nama_kartu"
                                value="{{ $kartu->nama_kartu }}" placeholder=" Name" required>
                            @error('nama_kartu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">total </label>
                            <input type="text" class="form-control @error('total') is-invalid @enderror" name="total"
                                value="{{ $kartu->total }}" placeholder=" Name" required>
                            @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">keterangan</label>
                            <textarea class="form-control" class="form-control @error('no') is-invalid @enderror"
                                name="no" rows="3" placeholder="no"
                                required>{{ $kartu->no }}</textarea>
                            @error('no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-sm btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
