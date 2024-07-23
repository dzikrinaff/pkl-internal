@extends('layouts.include.frontend.user')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="row">
                    <div class="card mt-0 p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row mt-3">
                                    <div class="col-6 px-4">
                                        <h4><b>Dompet Anda</b></h4>
                                    </div>
                                    <div class="col-6 px-3 text-end">
                                        <a class="btn bg-gradient-dark" href="{{ route('kartu.create') }}"><i
                                                class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kartu</a>
                                    </div>
                                </div>
                            </div>
                            @foreach ($kartu as $item)
                            <div class="col me-auto mb-2 px-3">
                                <div class="card bg-transparent shadow-xl">
                                    <div class="overflow-hidden position-relative border-radius-xl"
                                        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                        <span class="mask bg-gradient-dark"></span>
                                        <div class="card-body position-relative z-index-1 p-3">
                                                <h6 class="text-white mt-4 mb-5 pb-2">{{ $item->nomor }}</h6>

                                                <div class="d-flex">
                                                    <div class="d-flex">
                                                        <div class="me-4">
                                                            <p class="text-white text-sm opacity-8 mb-0">Nama Dompet</p>
                                                            <h6 class="text-white mb-1">{{ $item->nama_kartu }}</h6>
                                                        </div>
                                                        <div class="me-4">
                                                            <p class="text-white text-sm opacity-8 mb-0">keterangan</p>
                                                            <h6 class="text-white mb-1">{{ $item->no }}</h6>


                                                        <div>
                                                            <p class="text-white text-sm opacity-8 mb-0">Total saldo</p>
                                                            <h6 class="text-white mb-0">Rp {{ $item->total }}</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            <div class="col-lg-12 mb-2">
                                <div class="row mt-3">
                                    <div class="col-6 px-4">
                                        <h5>Total Saldo</h5>
                                        <h4><b>Rp {{ $saldo }}</b></h4>
                                    </div>
                                    <div class="col-3 text-center">
                                        <a class="btn bg-gradient-primary"
                                            href="{{ route('pemasukan.create') }}">Pemasukan</a>

                                    </div>
                                    <div class="col-3 text-center">
                                        <a class="btn bg-gradient-danger"
                                            href="{{ route('pengeluaran.create') }}">Pengeluaran</a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3 px-4 mt-2">
                                        <h5>Pemasukan</h5>
                                        <h4><b>Rp {{ $allPemasukan }}</b></h4>
                                    </div>
                                    <div class="col-3 px-4 mt-2">
                                        <h5>Pengeluaran</h5>
                                        <h4><b>Rp {{ $allPengeluaran}}</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-2">
                    <div class="card-header bg-transparent">
                        <h4><b>Statistik</b></h4>
                        <p class="text-sm mt-4">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="myChart" width="400" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h4><b>Riwayat</b></h4>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    No</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Username</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Kartu</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Jumlah</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Jenis</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Kategori</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tanggal</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
