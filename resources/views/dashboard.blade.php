@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Selamat datang, {{Auth::user()->name}}
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Target bulan ini</span>
              <span class="info-box-number">
                @if ($target)
                  Rp. {{number_format($target->target_amount, 2)}}
                @else
                  Tidak ada target bulan ini
                @endif
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa ion-pie-graph"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Target Tercapai</span>
              <span class="info-box-number">Rp. {{number_format($pencapaian)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-arrow-graph-up-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Presentase</span>
              <span class="info-box-number">
                @if ($presentase)
                  {{number_format($presentase, 2)}}%
                @else
                  Tidak ada target bulan ini
                @endif
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-android-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Produk terjual</span>
              <span class="info-box-number">{{number_format($penjualan)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
