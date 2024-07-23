<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Kartu;
use Illuminate\Http\Request;
use Alert;

use Storage;

class pemasukanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /*c*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::latest()->paginate(5);
        confirmDelete('hapus kartu,apakah anda yakin');
        return view('pemasukan.index', compact('pemasukan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartu = Kartu::all();
        $pemasukan = Pemasukan::all();
        return view('pemasukan.create', compact('pemasukan', 'kartu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *md*/
    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah_pemasukan' => 'required',
            'deskripsi' => 'required',
            'id_kartu' => 'required',

        ]);
        $pemasukan = new pemasukan();
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->id_kartu = $request->id_kartu;

        $kartu = Kartu::find($request -> id_kartu);
        $kartu->total += $request ->jumlah_pemasukan;
        $kartu->save();
        Alert::success('Sucess','kartu berhasil dibuat');

        $pemasukan->save();
        return redirect()->route('pemasukan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemasukan = pemasukan::findOrFail($id);
      return view('pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemasukan = pemasukan::findOrFail($id);
        $kartu = Kartu::all();
        return view('pemasukan.edit', compact('pemasukan', 'kartu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jumlah_pemasukan' => 'required',
            'deskripsi' => 'required',
            'id_kartu' => 'required',


        ]);

        $pemasukan = pemasukan::findOrFail($id);
        $kartu = $pemasukan->kartu;
        $kartu->total = $kartu->total - $pemasukan->jumlah_pemasukan + $request ->jumlah_pemasukan;
        $kartu->save();
        Alert::success('Sucess','kartu berhasil diedit');

        $pemasukan->update($request->all());
        return redirect()->route('pemasukan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = pemasukan::findOrFail($id);
        $kartu = $pemasukan->kartu;
        $kartu->total -= $pemasukan->jumlah_pemasukan;
        $kartu->save();
        Alert::success('Sucess','kartu berhasil dihapus');
        $pemasukan->delete();
        return redirect()->route('pemasukan.index');
    }
}
