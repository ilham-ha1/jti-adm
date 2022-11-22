<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::paginate(5);
        return view('dashboard.category.index', compact('kategori'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $kategori = Kategori::query()
            ->where('nama_kategori', 'LIKE', "%{$search}%")
            ->get();
        return view('dashboard.category.search', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => ['required', 'string', 'max:255','unique:kategori,nama_kategori'],
        ];

        $data = $request->validate($rules);
        
        Kategori::create($data);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
                'nama_kategori' => ['required', 'string', 'max:255'],
            ];
    
            $data = $request->validate($rules);
            
            Kategori::where('id', $id)->update($data);
    
            return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('dashboard.category.edit', compact('kategori'));
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('categories.index');
    }

    
}
