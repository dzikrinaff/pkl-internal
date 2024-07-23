@extends('layouts.include.frontend.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                      <h3>  {{ __('pengeluaran') }} </h3>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('pengeluaran.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>jumlah pengeluaran</th>
                                    <th>deskripsi</th>
                                    <th>nama kartu</th>
                                    <th>tanggal</th>
                                    <th>opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($pengeluaran as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->jumlah_pengeluaran }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->kartu->nama_kartu }}</td>
                                    <td> <strong> {{ $data->created_at->format('d-m-Y') }} </strong></td>

                                    <td>
                                        <form action="{{ route('pengeluaran.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a href="{{ route('pengeluaran.show', $data->id) }}"
                                                class="btn btn-sm btn-warning">Show</a> | --}}
                                            <a href="{{ route('pengeluaran.edit', $data->id) }}"
                                                class="btn btn-sm btn-success">Edit</a> |
                                                <button type="submit"
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
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            //agar tombol maupun kolom action tidak terbawa
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':not(:last-child)',
                            stripHtml: false,
                            //untuk gambar
                            format: {
                                body: function(data, column, row) {
                                    // ambil dari kolom table gambar
                                    if (column === 3) {
                                        return '<img src="' + $(data).find('img').attr('src') +
                                            '" width="50"/>';
                                    }
                                    return data;
                                }
                            }
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)',
                            stripHtml: false,
                            format: {
                                body: function(data, column, row) {
                                    if (column === 3) {
                                        return '<img src="' + $(data).find('img').attr('src') +
                                            '" width="50"/>';
                                    }
                                    return data;
                                }
                            }
                        }
                    }
                ]
            });
        });
    </script>
@endpush
