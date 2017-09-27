<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      $category = \App\Models\Category::all();
      return view('category.index', ['category' => $category]);
    }

    public function post_category(Request $request)
    {

      try {
        \App\Models\Category::create($request->except('_token'));
        return redirect()->back()->with(['success' => 'Berhasil Tambah kategori']);
      } catch (\Exception $e) {
        return redirect()->back()->with(['error' => 'Gagal Tambah kategori']);
      }

    }

    public function delete($id)
    {
      try {
        $find = \App\Models\Category::find($id)->delete();
        return redirect()->back()->with(['success' => 'Berhasil hapus kategori']);
      } catch (\Exception $e) {
        return redirect()->back()->with(['error' => 'Gagal hapus kategori']);
      }

    }
}
