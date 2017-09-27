@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Buat produk baru
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Produk Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('includes.message')
            <form role="form" method="post" action="{{route('product.edit.post', ['id' => $product->id])}}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group @if($errors->has('sku')) has-error @endif">
                  <label for="exampleInputEmail1">SKU</label>
                  <input class="form-control" id="sku" name="sku" placeholder="Nomor SKU" type="text" value="{{$product->sku}}">
                  <p class="help-block">
                    {{$errors->first('sku')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('name')) has-error @endif">
                  <label for="name">Nama Produk</label>
                  <input class="form-control" id="name" name="name" placeholder="Nama Produk" type="text" value="{{$product->name}}">
                  <p class="help-block">
                    {{$errors->first('name')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                  <label for="name">Kategori</label>
                  <select class="form-control" name="category_id">
                    @foreach($categories as $row)
                      <option value="{{ $row->id }}">{{$row->category_name}}</option>
                    @endforeach
                  </select>
                  <p class="help-block">
                    {{$errors->first('category_id')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('purchase_price')) has-error @endif">
                  <label for="purchase_price">Harga beli</label>
                  <input class="form-control" id="purchase_price" name="purchase_price" placeholder="Harga Beli" type="text" value="{{$product->selling_price}}">
                  <p class="help-block">
                    {{$errors->first('purchase_price')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('selling_price')) has-error @endif">
                  <label for="selling_price">Harga Jual</label>
                  <input class="form-control" id="selling_price" name="selling_price" placeholder="Harga jual" type="text" value="{{$product->purchase_price}}">
                  <p class="help-block">
                    {{$errors->first('selling_price')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('stock')) has-error @endif">
                  <label for="stock">Stok</label>
                  <input class="form-control" id="stock" name="stock" placeholder="Stok awal" type="text" value="{{$product->stock}}">
                  <p class="help-block">
                    {{$errors->first('stock')}}
                  </p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
