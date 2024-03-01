<?php

namespace App\Http\Controllers;

//import Model "kategori"
use App\Models\kategori;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

class KategoriController extends Controller
{
    public function index(): View
    {
        //get posts
        $kategoris = kategori::latest()->paginate(5);

        //render view with posts
        return view('kategoris.index1', compact('kategoris'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('kategoris.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        //create post
        kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $kategoris = kategori::findOrFail($id);

        //render view with post
        return view('kategoris.show', compact('kategoris'));
    }
}
