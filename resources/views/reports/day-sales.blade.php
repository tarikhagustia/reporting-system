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
                <form class="" action="" method="get">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Dari tanggal</label>
                        <input type="text" name="dateFrom" class="form-control" id="datepicker">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Sampai tanggal</label>
                        <input type="text" name="dateTo" class="form-control" id="datepicker2">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Proses</button>
                    {{-- <button type="button" class="btn btn-warning" name="button">Export ke excel</button> --}}
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
                    <tbody>
                      @foreach ($reports as $key => $value)

                      <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                          {{$value->created_at}}
                        </td>
                        <td>
                          {{number_format($value->getRemainTargetByDate($dateFrom))}}
                        </td>
                        <td>
                          {{number_format($value->dayily_sales)}}
                        </td>
                        <td>
                          {{number_format($value->getTotalSalesByDate($dateFrom))}}
                        </td>
                        <td>
                          {{ ($value->getTotalSalesByDate($dateFrom) / $value->getRemainTargetByDate($dateFrom)) * 100 }}
                        </td>
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
    $('#datepicker2').datepicker({
      autoclose: true
    })
  })
</script>
@endsection
