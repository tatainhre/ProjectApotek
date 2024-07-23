<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    //
    public function index()
    {
        $data = ['nama' => "user"];
        $obats = Obat::with('kategori')->get();

        return view('obat.index', compact(['data', 'obats']));
    }

    public function create()
    {
        //
        $data = ['nama' => "user"];
        $kategoris = Kategori::all();
        return view('obat.create', compact(['data', 'kategoris']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'kode_obat' => 'required|unique:obats|max:255',
                'nama_obat' => 'required|max:255',
                'id_kategori' => 'required',
                'stok' => 'required|max:255',
                'harga' => 'required|max:255',
            ],
            [
                'kode_obat.required' => 'Kode Obat harus diisi',
                'kode_obat.unique' => 'Kode sudah ada',
                'kode_obat.max' => 'Kode Obat maksimal 255 karakter',
                'nama.required' => 'Nama harus diisi',
                'id_kategori.required' => 'Kategori harus diisi',
                'stok.required' => 'Stok harus diisi',
                'harga.required' => 'harga harus diisi',
            ]
        );

        Obat::create($request->all());
        return redirect('/obat');
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
        $data = ['nama' => "admin"];
        $obat = Obat::find($id);
        $kategoris = Kategori::all();
        return view('obat.edit', compact(['data', 'obat', 'kategoris']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_obat' => 'required|max:255',
                'id_kategori' => 'required',
                'stok' => 'required|max:255',
                'harga' => 'required|max:255',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'id_kategori.required' => 'Kategori harus diisi',
                'stok.required' => 'Stok harus diisi',
                'harga.required' => 'harga harus diisi',
            ]
        );

        Obat::find($id)->update($request->all());
        return redirect('/obat');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Obat::destroy($id);
        return redirect('/obat');
    }
}
