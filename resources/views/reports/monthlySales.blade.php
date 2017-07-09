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
              <h3 class="box-title">Laporan penjualan bulanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <form class="" action="index.html" method="post">
                  <div class="form-group">
                    <label for="">Pilih bulan</label>
                    <select class="form-control" name="month_name">

                    </select>
                  </div>
                  <div class="form-group">

                    <button type="button" class="btn btn-warning" name="button">Export ke Excel</button>
                  </div>
                </form>
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
