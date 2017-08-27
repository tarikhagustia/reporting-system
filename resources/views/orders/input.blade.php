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
  <section class="content" id="inputorder">
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
                      <select class="form-control" name="order_number" v-model="order_number" @change="getOrderDetails">
                          <option value="" selected="true">-- pilih nomor po --</option>
                        @foreach ($orders as $key => $value)
                          <option value="{{$value->order_number}}">{{$value->order_number}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </form>
                <hr>
              <legend>Nomor Order : @{{order_number}}</legend>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
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
                      <th>
                        Tanggal
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(row, key) in orders">
                      <td>
                        @{{key + 1}}
                      </td>
                      <td>
                        @{{row.product_name}}
                      </td>
                      <td>
                        @{{row.quantity}}
                      </td>
                      <td>
                        @{{row.created_at}}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" @click="onProses" class="btn btn-info pull-right">Proses barang</button>
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


@section('javascript')
<script type="text/javascript">

  $(function(){
    let API_URL = '{{url('api')}}';
    var vo = new Vue({
      el : "#inputorder",
      data : {
        order_number : '',
        orders : []
      },

      methods : {

        getOrderDetails(){
          $.ajax({
            url : API_URL + '/order/get/' + this.order_number,
            dataType : 'json'
          })
          .success((response) => {
            this.orders = response;
          });
        },

        onProses(){
          if(this.orders.length < 1){
            alert("Tidak ada data yang harus diproses")
            return;
          }
          if(this.order_number == ""){
            alert("Pilih nomor PO")
            return;
          }

          $.ajax({
            url : API_URL + '/order/process_order/' + this.order_number,
            dataType : 'json',
            method : 'POST'
          }).success((response) => {
            alert(response.message)
            window.location.reload();
          }).error((error) => {
            alert('error')
            window.location.reload();
          })

        }


      },

    });
    //
    // $('select[name=order_number]').on('change', function(e){
    //   var order_number = e.target.value;
    //   if(order_number == ""){
    //     alert("Nomor order tidak valid");
    //     return;
    //   }
    //
    // });

  })
</script>

@endsection
