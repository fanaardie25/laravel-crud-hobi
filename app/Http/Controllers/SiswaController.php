<?php

namespace App\Http\Controllers;

use App\Models\Nisn;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasiswa = siswa::all();
        return view('siswa.app', compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'nisn' => 'required|max:20|unique:nisns,nisn',
        ],[
            'name.required' => 'Nama hobi tidak boleh kosong',
            'name.min' => 'Nama hobi minimal 3 karakter',
            'name.max' => 'Nama hobi maksimal 20 karakter',
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.max' => 'Nisn maksimal 20 karakter',
            'nisn.unique' => 'Nisn sudah ada',
        ]);

        $siswa = Siswa::create([ 'name' => $request->input('name')]);
        Nisn::create(['nisn' => $request->input('nisn'), 'siswa_id' => $siswa->id]);

        return redirect()->route('siswa.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datasiswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('datasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'nisn' => 'required|max:20|unique:nisns,nisn',
        ],[
            'name.required' => 'Nama hobi tidak boleh kosong',
            'name.min' => 'Nama hobi minimal 3 karakter',
            'name.max' => 'Nama hobi maksimal 20 karakter',
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.max' => 'Nisn maksimal 20 karakter',
            'nisn.unique' => 'Nisn sudah ada',
        ]);

        Siswa::where('id',$id)->update([ 
            'name' => $request->input('name')
        ]);

        Nisn::where('siswa_id',$id)->update([
            'nisn' => $request->input('nisn'),
        ]);

        return redirect()->route('siswa.index')->with('success','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::where('id',$id)->delete();

        return redirect()->route('siswa.index')->with('success','Data berhasil di hapus');
    }
}
