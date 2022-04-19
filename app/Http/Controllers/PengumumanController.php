<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Requests\StorePengumumanRequest;
use App\Http\Requests\UpdatePengumumanRequest;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('list_data',[
            'data' => Pengumuman::all()
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengumumanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengumumanRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'isi' => 'required',
        ]);
        Pengumuman::create($validatedData);
        return redirect()->route('home')->with('sukses', 'Penambahan Pengguna berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Pengumuman::where('id', $id)->first();
        return view('detail_data', [
            'data' => $data
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengumuman::where('id', $id)->first();
        return view('edit_data', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengumumanRequest  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'isi' => 'required',
        ]);
        $updated = Pengumuman::findOrFail($id);
        $updated->update($validatedData);
        return redirect()->route('home')->with('sukses', 'Penambahan Pengguna berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $deleted = Pengumuman::findOrFail($id);
        $deleted->delete();
        return redirect()->route('home')->with('sukses', 'penghapusan Pengguna berhasil');
    }
}
