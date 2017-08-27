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
}
