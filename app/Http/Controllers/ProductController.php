<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
      $categories = Category::orderBy('category_name')->get();
      return view('products.add', ['categories' => $categories]);
    }

    public function product_add_post(Request $request)
    {
      $this->validate($request, [
        'sku' => 'required',
        'name' => 'required',
        'category_id' => 'required',
        'purchase_price' => 'required',
        'selling_price' => 'required',
        'stock' => 'required',
        'stock' => 'required',
      ]);

      $sql = new Product;

      $sql->sku = $request->sku;
      $sql->name = $request->name;
      $sql->category_id = $request->category_id;
      $sql->purchase_price = $request->purchase_price;
      $sql->stock = $request->stock;
      $sql->selling_price = $request->selling_price;

      try {
        $sql->save();
        return redirect()->back()->with(['success' => 'berhasil tambah barang']);
      } catch (\Exception $e) {
        return redirect()->back()->with(['error' => 'berhasil tambah barang']);

      }


    }


    public function laporan_produk()
    {
      $products = Product::paginate(5);

      return view('reports.products', [
        'products' => $products
      ]);
    }

    public function delete($id)
    {
      try {
        $find = Product::find($id)->delete();
        return redirect()->back()->with(['success' => 'Berhasil hapus produk']);
      } catch (\Exception $e) {
        return redirect()->back()->with(['error' => 'Gagal hapus produk']);
      }
    }

    public function edit($id)
    {
      $product = Product::find($id);
      $categories = Category::orderBy('category_name')->get();

      return view('products.edit', ['product' => $product , 'categories' => $categories]);
    }

    public function edit_post(Request $request, $id)
    {

      try {
        $find = Product::where('id', $id)
                        ->update($request->except('_token'));
        return redirect()->back()->with(['success' => 'Berhasil edit produk']);
      } catch (\Exception $e) {
        return redirect()->back()->with(['error' => 'Gagal edit produk ' . $e->getMessage()]);
      }

    }
}
