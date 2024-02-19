<?php

namespace App\Http\Controllers;

//import Model "kategori"
use App\Models\kategori;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(): View
    {
        //get posts
        $kategoris = kategori::latest()->paginate(5);

        //render view with posts
        return view('kategoris.index1', compact('kategoris'));
    }
}