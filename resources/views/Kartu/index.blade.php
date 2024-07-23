@extends('layouts.include.frontend.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                     <h2>  {{ __('Kartu') }} </h2> 
                    </div>
                    <div class="float-end">
                        <a href="{{ route('kartu.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>nama kartu</th>
                                    <th>total</th>
                                    <th>keterangan</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($kartu as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{!! $data->nama_kartu !!}</td>
                                    <td>{{ $data->total }}</td>
                                    <td>{{ $data->no}}</td>

                                    <td>
                                        <form action="{{ route('kartu.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a href="{{ route('kartu.show', $data->id) }}"
                                                class="btn btn-sm btn-warning">Show</a> | --}}
                                            <a href="{{ route('kartu.edit', $data->id) }}"
                                                class="btn btn-sm btn-success">Edit</a> |
                                                <a href="{{ route('kartu.destroy', $data->id) }}" data-confirm-delete="true"
                                                class="btn btn-sm btn-danger">Delete</a>
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
