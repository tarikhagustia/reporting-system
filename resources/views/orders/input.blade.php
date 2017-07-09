@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pembelian
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pembelian Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="order_number" class="col-sm-2 control-label">Pilih Nomor PO</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="order_number">

                      </select>
                    </div>
                  </div>
                </form>
                <hr>
              <legend>Nomor Order : APTKSGR143042</legend>
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Nama Produk
                    </th>
                    <th>
                      Jumlah
                    </th>
                  </tr>
                </table>
              </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Proses barang</button>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
