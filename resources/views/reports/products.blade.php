@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{asset('plugins/dataTable/dataTables.bootstrap.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                @include('includes.message')
                <div class="table-responsive">
                  <table id="product-report" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Stok</th>
                        <th>Harga Jual</th>
                        <th>#</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($products as $key => $value)
                        <tr>
                          <td>
                              {{$loop->iteration}}
                          </td>
                          <td>
                            {{$value->name}}
                          </td>
                          <td>
                            {{number_format($value->stock)}}
                          </td>
                          <td>
                            {{number_format($value->selling_price)}}
                          </td>
                          <td><a href="{{route('product.delete', ['id' => $value->id])}}">Hapus</a>| <a href="{{route('product.edit',['id' => $value->id])}}">Edit</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


@section('javascript')
  <!-- DataTables -->
<script src="{{asset('plugins/dataTable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/dataTable/dataTables.bootstrap.min.js')}}"></script>

<script type="text/javascript">
$(function(){
  $('#product-report').DataTable();
});
</script>
@endsection
