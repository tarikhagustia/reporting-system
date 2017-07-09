@extends('layouts.master')


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
              <h3 class="box-title">Laporan penjualan harian</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <form class="" action="index.html" method="post">
                  <div class="form-group">
                    <label for="">Pilih tanggal</label>
                    <input type="text" class="form-control" id="datepicker">
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success" name="button">Proses</button>
                    <button type="button" class="btn btn-warning" name="button">Export ke excel</button>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Tanggal</th>
                      <th>Target s/d Hari ini</th>
                      <th>Sales Harian</th>
                      <th>Sales s/d Hari ini</th>
                      <th>Persentase</th>
                    </tr>
                    </thead>
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

@section('css')
<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('javascript')
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}" charset="utf-8"></script>
<script type="text/javascript">
  $(function(){

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>
@endsection
