<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list_data2',[
            'data' => Mahasiswa::all()
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_data2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nrp' => 'required',
            'kota_asal' => 'required',
            'ipk' => 'required|min:2|max:4',
        ]);
        Mahasiswa::create($validatedData);
        return redirect()->route('home2')->with('sukses', 'Penambahan Pengguna berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Mahasiswa::where('id', $id)->first();
        return view('detail_data2', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::where('id', $id)->first();
        return view('edit_data2', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nrp' => 'required',
            'kota_asal' => 'required',
            'ipk' => 'required|min:2|max:4',
        ]);
        $updated = Mahasiswa::findOrFail($id);
        $updated->update($validatedData);
        return redirect()->route('home2')->with('sukses', 'Penambahan Pengguna berhasil');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $deleted = Mahasiswa::findOrFail($id);
        $deleted->delete();
        return redirect()->route('home2')->with('sukses', 'penghapusan Pengguna berhasil');
    }
}
