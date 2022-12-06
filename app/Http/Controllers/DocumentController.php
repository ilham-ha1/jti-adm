<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = Dokumen::latest()->filter(request(['search', 'kategori']))->paginate('20');
        $kategori = Kategori::all();
        return view('dashboard-operator.document.index', compact('dokumen', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard-operator.document.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request ->validate([
            'kategori_id' => 'required',
            'kode' => 'required|string|max:255',
            'nomor_surat' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'lulus' => ['required', 'integer'],
            'oerdner',
            'map',
            'file',
        ]);

        if ($request->file('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $validateData['file'] = $request->file('file')->storeAs('Dokumen', $filename.'.pdf');
        }

        Dokumen::create($validateData);

        return redirect()->route('document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokumen = Dokumen::latest()->find($id);
        return view('dashboard-operator.document.show', compact('dokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokumen = Dokumen::latest()->find($id);
        $kategori = Kategori::all();
        return view('dashboard-operator.document.edit', compact('dokumen', 'kategori'));
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
        $rules = [
            'kategori_id' => 'required',
            'kode' => 'required|string|max:255',
            'nomor_surat' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'lulus' => ['required', 'integer'],
            'oerdner',
            'map',
            'file',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $nim = $request->nim;
            $validateData['file'] = $request->file('file')->storeAs('Dokumen', $nim.'.pdf');
        }
        
        Dokumen::where('id', $id)
            ->update($validateData);
        return redirect()->route('document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);
        if ($dokumen->file) {
            Storage::delete($dokumen->file);
        }
        Dokumen::destroy($dokumen->id);
        return redirect()->route('document.index');
    }
}
