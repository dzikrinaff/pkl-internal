@extends('layouts.include.frontend.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                     <h3>  {{ __('Pemasukan') }} </h3> 
                    </div>
                    <div class="float-end">
                        <a href="{{ route('pemasukan.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>jumlah pemasukan</th>
                                    <th>deskripsi</th>
                                    <th>nama kartu</th>
                                    <th>tanggal</th>
                                    <th>opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($pemasukan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$data->jumlah_pemasukan }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->kartu->nama_kartu }}</td>
                                    <td> <strong> {{ $data->created_at->format('d-m-Y') }} </strong></td>
                                    <td>
                                        <form action="{{ route('pemasukan.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a href="{{ route('pemasukan.edit', $data->id) }}"
                                                class="btn btn-sm btn-success">Edit</a> |
                                                <a href="{{ route('pemasukan.destroy', $data->id) }}" data-confirm-delete="true"
                                                class="btn btn-sm btn-danger">Delete</a> --}}

                                            <a href="{{ route('pemasukan.edit', $data->id) }}"
                                                class="btn btn-sm btn-success">Edit</a> |
                                            <button type="submit" data-confirm-delete="true";
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
