<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\barang;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $barangs = barang::latest()->paginate(5);

        //render view with posts
        return view('barangs.index2', compact('barangs'));
    }

     /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('barangs.create');
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
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'harga_barang' => 'required',
            'id_kategori' => 'required',
        ]);

        //create post
        barang::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'harga_barang' => $request->harga_barang,
            'id_kategori' => $request->id_kategori
        ]);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $barangs = barang::findOrFail($id);

        //render view with post
        return view('barangs.show', compact('barangs'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $barangs = barang::findOrFail($id);

        //render view with post
        return view('barangs.edit', compact('barangs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_barang'     => 'required',
            'jumlah'   => 'required',
            'keterangan'   => 'required',
            'harga_barang'   => 'required',
            'id_kategori'   => 'required'
        ]);

        //get post by ID
        $barangs = barang::findOrFail($id);

            //update post with new image
            $barangs->update([
                'nama_barang' => $request->nama_barang,
               'jumlah' => $request->jumlah,
               'keterangan' => $request->keterangan,
               'harga_barang' => $request->harga_barang,
               'id_kategori' => $request->id_kategori
            ]); 
        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    //function destroy/delete
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $barangs = barang::findOrFail($id);

        //delete post
        $barangs->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}