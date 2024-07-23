@extends('layouts.include.frontend.admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> User</h4>
    <div class="card">
        <h5 class="card-header">Table User</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Last Seen</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @php $no = 1; @endphp
                @foreach ($user as $item)
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->created_at->format('d-m-Y')}}</td>
                        <td>
                            <form action="{{route('kartu.destroy',$item->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{route('kartu.edit',$item->id)}}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                {{-- <a href="{{route('kartu.show',$item->id)}}" class="btn btn-sm btn-warning">
                                    Show
                                </a> --}}

                                <a href="{{route('kartu.destroy',$item->id)}}" class="btn btn-sm btn-danger" type="submit"
                                    data-confirm-delete="true">
                                    Delete
                                </a>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
