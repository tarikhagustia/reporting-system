@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Penjualan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Penjualan Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group @if($errors->has('sku')) has-error @endif">
                  <label for="exampleInputEmail1">SKU</label>
                  <input class="form-control" id="sku" name="sku" placeholder="Nomor SKU" type="text">
                  <p class="help-block">
                    {{$errors->first('sku')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('name')) has-error @endif">
                  <label for="name">Nama Produk</label>
                  <input class="form-control" id="name" name="name" placeholder="Nama Produk" type="text">
                  <p class="help-block">
                    {{$errors->first('name')}}
                  </p>
                </div>
                <div class="">
                  <button type="button" class="btn btn-success" name="button">Tambah</button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <tr>
                    <th>
                      Nomor
                    </th>
                    <th>
                      Nama Produk
                    </th>
                    <th>
                      Jumlah
                    </th>
                    <th>
                      Harga
                    </th>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-lg pull-right">Bayar</button>
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
