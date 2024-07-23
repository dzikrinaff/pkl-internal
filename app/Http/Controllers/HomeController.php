<?php

namespace App\Http\Controllers;
use App\Models\Kartu;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kartu= Kartu::all();
        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran ::all();
        // $saldo = Pemasukan::sum('jumlah_pemasukan');
        $saldo = Pemasukan::sum('jumlah_pemasukan') - Pengeluaran::sum('jumlah_pengeluaran');
        $allPemasukan = Pemasukan::sum('jumlah_pemasukan');
        $allPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
        return view('home', ['kartu' => $kartu, 'pemasukan' => $pemasukan, 'pengeluaran' => $pengeluaran, 'saldo' => $saldo,'allPemasukan' => $allPemasukan,'allPengeluaran'=>$allPengeluaran]);

        $masukPemasukan = Pemasukan::select('jumlah_pemasukan')->get();
        // $masukPengeluaran = Pengeluaran::select('jumlah_pengeluaran')->get();

        $totalPemasukan = $masukPemasukan->sum('jumlah_pemasukan');
        $hasilPemasukan = $masukPemasukan->pluck('jumlah_pemasukan');
    }
}
