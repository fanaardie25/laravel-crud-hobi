<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Student;
use App\Models\Telepon;
use Illuminate\Http\Request;

class TeleponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('telephone.show');
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
            'nomor' => 'required|unique:telepons,telepon|max:13',
            'student_id' => 'required|exists:students,id',
        ],[
            'nomor.required' => 'Nomor Telepon Wajib Diisi',
            'nomor.unique' => 'nomor telepon sudah ada',
            'nomor.max' => 'maximal karakter adalah 13'
        ]);

        Telepon::create(['telepon' => $request->input('nomor'), 'student_id' => $request->input('student_id')]);

        return redirect()->route('student.show', $request->student_id)->with('success', 'Nomor telepon berhasil ditambahkan.');
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
        $datatelepon = Telepon::findOrFail($id);
        return view('telephone.edit-telepon', compact('datatelepon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor' => 'required|unique:telepons,telepon|max:13',
            // 'student_id' => 'required|exists:students,id',
        ],[
            'nomor.required' => 'Nomor Telepon Wajib Diisi',
            'nomor.unique' => 'nomor telepon sudah ada',
            'nomor.max' => 'maximal karakter adalah 13'
        ]);

        $data = [
            'telepon' => $request->input('nomor'),
        ];

        Telepon::where('id',$id)->update($data);

        return redirect()->route('student.show', $request->student_id)->with('success', 'Nomor telepon berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Telepon::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Nomor telepon berhasil dihapus.');
    }
}
