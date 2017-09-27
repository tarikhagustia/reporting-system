@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kategori
    </h1>
  </section>

  <!-- Main content -->
  <section class="content" id="inputorder">
    <div class="row">
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Kategori Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                @include('includes.message')
                <form class="" action="{{route('category.post')}}" method="post">
                  {{ csrf_field() }}
                  <label for="">Nama Kategori</label>
                  <input type="text" class="form-control" name="category_name" value="">
                  <br>
                  <button type="submit" class="btn btn-success" name="button">Simpan</button>
                </form>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Jenis</th>
                      <th>#</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach ($category as $key => $value)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->category_name}}</td>
                        <td><a href="{{route('category.delete', ['id' => $value->id])}}">Hapus</a> </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
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
