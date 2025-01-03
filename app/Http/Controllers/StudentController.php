<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Student;
use App\Models\Telepon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datastudent = Student::paginate(5); 
        return view('telephone.app', compact('datastudent'));
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
            'name' => 'required|min:3|max:255',
            'nisn' => 'required|max:20|unique:students,nisn',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.max' => 'Nisn maksimal 20 karakter',
            'nisn.unique' => 'Nisn sudah ada',
        ]);

        $data = [
            'name' => $request->input('name'),
            'nisn' => $request->input('nisn'),
        ];

        Student::create($data);

        return redirect()->route('student.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datastudent = Student::with('telepon')->findOrFail($id);
        return view('telephone.show', compact('datastudent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datastudent = Telepon::where('student_id', $id)->firstOrFail();
        return view('telephone.edit', compact('datastudent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'nisn' => 'required|max:20|unique:students,nisn',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',
            'nisn.required' => 'Nisn tidak boleh kosong',
            'nisn.max' => 'Nisn maksimal 20 karakter',
            'nisn.unique' => 'Nisn sudah ada',
        ]);

        $data = [
            'name' => $request->input('name'),
            'nisn' => $request->input('nisn'),
        ];

        Student::where('id',$id)->update($data);

        return redirect()->route('student.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::where('id',$id)->delete();

        return redirect()->route('student.index')->with('success','Data berhasil di hapus');
    }
}
