<?php

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Saleout;
use App\Models\Salein;

// use Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product/get/{sku}', function($sku){
  $product = Product::where('sku', $sku)->firstOrFail();
  return response()->json($product);
});

Route::post('product/post', function(Request $request){

  foreach($request->products as $row):
    $sql = new Saleout;
    $sql->note_number = $request->note_number;
    $sql->product_id = $row['id'];
    $sql->user_id = $request->user_id;
    $sql->quantity = $row['jumlah'];
    $sql->save();

    $product = Product::find($row['id']);
    $product->stock = $product->stock - $row['jumlah'];
    $product->save();
  endforeach;
  return response()->json(['message' => 'Berhasil tambah penjualan']);
});

Route::post('order/post', function(Request $request){
  foreach($request->products as $row):
  $sql = new Salein;
  $sql->order_number = $request->order_number;
  $sql->product_id = $row['id'];
  $sql->quantity = $row['jumlah'];
  $sql->status = 'ordering';
  $sql->save();
  endforeach;
  return response()->json(['message' => 'Berhasil order barang']);
});

Route::get('order/get/{order_number}', function($order_number){
  $order = Salein::where("order_number", $order_number);
  $response = [];
  foreach ($order->get() as $key => $value) {
    $response[$key] = $value;
    $response[$key]['product_name'] = $value->product->name;
  }
  return response()->json($response);

});

Route::post("order/process_order/{order_number}", function($order_number){
  $salein = Salein::where("order_number", $order_number);
  $sql = $salein->update(['status' => 'processed']);
  foreach ($salein->get() as $key => $value) {
    $product = Product::find($value->product_id);
    $product->stock = $product->stock + $value->quantity;
    $product->save();
  }
  return response()->json(['message' => 'Berhasil ditambahkan ke stock']);
});
