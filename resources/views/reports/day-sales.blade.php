@extends('layouts.master')


@section('content')


@php
  @$target_harian =$target->target_amount / $diff;
@endphp

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
              <h3 class="box-title">Laporan penjualan </h3>
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
                <div class="row">
                  <div class="col-sm-4">
                    <table class="table table-striped">
                      <tr>
                        <td>
                          Nama BA
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          {{Auth::user()->name}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Nama Counter
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          Apotek Seger
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Bulan
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          {{Carbon::parse($dateFrom)->formatLocalized('%B %Y') }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Target Global
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          {{number_format($target->target_amount)}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Target Harian
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          {{number_format($target_harian , 2) }}
                        </td>
                      </tr>

                    </table>
                  </div>
                </div>
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
                      @php
                        $t_total = $target_harian;
                        $s_harian = 0;
                      @endphp
                      @foreach ($reports as $key => $value)
                      @php
                        $s_harian += $value->dayily_sales;
                      @endphp
                      <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                          {{$value->created_at}}
                        </td>
                        <td>
                          {{number_format($t_total,2)}}
                        </td>
                        <td>
                          {{number_format($value->dayily_sales)}}
                        </td>
                        <td>
                          {{number_format($s_harian, 2)}}
                        </td>
                        <td>
                          @php
                            $num = (round($s_harian) / round($t_total));

                            echo number_format($num * 100 , 3) . " %";
                          @endphp
                        </td>
                      </tr>
                      @php
                        $t_total += $t_total;

                      @endphp
                      @endforeach
                      <tr>
                        <td>
                          <strong>
                            Realisasi
                          </strong>
                        </td>
                        <td>
                          : {{number_format($s_harian, 2)}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            Actual %
                          </strong>
                        </td>
                        <td>
                          :
                          @php
                          $num = $s_harian / $target->target_amount;
                          echo number_format($num * 100, 5) . " %";
                          @endphp
                        </td>
                      </tr>
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
