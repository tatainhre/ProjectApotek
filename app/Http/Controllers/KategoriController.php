<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = ['nama' => "user"];
        $kategoris = Kategori::all();
        return view('kategori.index', compact(['data', 'kategoris']));
    }

    public function create()
    {
        $data = ['nama' => "user"];
        return view('kategori.create', compact(['data']));
    }

    public function store(Request $request)
    {
        $validdateData = $request->validate(
            [
                'kategoris_obat' => 'required|unique:kategoris|max:255'
            ],
            [
                'kategoris_obat.required' => 'Kategori harus diisi',
                'kategoris_obat.unique' => 'Kategori sudah ada',
                'kategoris_obat.max' => 'Kategori maksimal 255 karakter'
            ]
        );

        Kategori::create($validdateData);
        return redirect(route(''));
    }

    public function edit(String $id)
    {
        $data = ['nama' => "user"];
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact(['data', 'kategori']));
    }

    public function update(Request $request, string $id)
    {
        $validateData = $request->validate(
            [
                'kategoris_obat' => 'required|unique:kategoris|max:255'
            ],
            [
                'kategoris_obat.required' => 'Kategori harus diisi',
                'kategori_obat.unique' => 'Kategori sudah ada',
                'kategori_obat.max' => 'Kategori maksimal 255 karakter'
            ]
        );
        Kategori::find($id)->update($request->all());

        flash()->success('Data Berhasil diedit');
        return redirect('/kategori');
    }

    public function destroy(string $id)
    {
        Kategori::destroy($id);
        flash()->success('Data Berhasil dihapus');
        return redirect('/kategori');
    }
}
