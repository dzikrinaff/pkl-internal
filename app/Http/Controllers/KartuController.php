<?php

namespace App\Http\Controllers;

use App\Models\Kartu;
use Illuminate\Http\Request;
use Alert;
use Storage;

class kartuController extends Controller
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
        $kartu = Kartu::all();
        confirmDelete('hapus kartu,apakah anda yakin');
        return view('kartu.index', compact('kartu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartu = Kartu::all();
        return view('kartu.create', compact('kartu'));
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
            'nama_kartu' => 'required',
            'total' => 'nullable|integer',
            'no' => 'required',


        ]);
        $kartu = new kartu();
        $kartu->nama_kartu = $request->nama_kartu;
        $kartu->total = $request->total;
        $kartu->no = $request->no;
        $kartu->save();
        Alert::success('Success','kartu berhasil dibuat');
        return redirect()->route('kartu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kartu = kartu::findOrFail($id);
      return view('kartu.show', compact('kartu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kartu = kartu::findOrFail($id);
        return view('kartu.edit', compact('kartu'));
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
            'nama_kartu' => 'required',
            'no' => 'required',
            'total' =>'integer|min:0|nullable',

        ]);
        $kartu = new kartu();
        $kartu = kartu::findOrFail($id);
        $kartu->nama_kartu = $request->nama_kartu;
        $kartu->no = $request->no;
        $kartu->total = $request->total;
        $kartu->save();
        Alert::success('Success','kartu berhasil diedit');
        return redirect()->route('kartu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kartu = kartu::findOrFail($id);
        $kartu->delete();
        Alert::success('Success','kartu berhasil dihapus');
        return redirect()->route('kartu.index');
    }
}
