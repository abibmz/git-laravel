<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = siswa::where('nis', 'like', "%$katakunci%")
            ->orWhere('jurusan','like',"%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = siswa::orderBy('nis', 'desc')->paginate($jumlahbaris);
        }
        return view('crud.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session::flash('nis',$request->nis);
        session::flash('nama',$request->nama);
        session::flash('jurusan',$request->jurusan);
        
        $request->validate([
            'nis'=>'required|numeric|unique:siswa,nis',
            'nama'=>'required',
            'jurusan'=>'required',
        ],[
            'nis.required'=>'NIS wajib diisi',
            'nis.numeric'=>'NIS wajib angka',
            'nis.unique'=>'NIS sudah ada',
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
        ]);
        $data = [
            'nis'=> $request->nis,
            'nama'=> $request->nama,
            'jurusan'=> $request->jurusan,
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success','berhasil menambahkan data');
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
        $data = siswa::where('nis', $id)->first();
        return view('crud.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'jurusan'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
        ]);
        $data = [
            'nama'=> $request->nama,
            'jurusan'=> $request->jurusan,
        ];
        siswa::where('nis', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nis',$id)->delete();
        return redirect()->to('siswa')->with('success', 'berhasil hapus data');
    }
}
