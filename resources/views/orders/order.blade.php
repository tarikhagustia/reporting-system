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
  <section class="content" id="app">
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
                    <label for="order_number" class="col-sm-1 control-label">Order No:</label>
                    <div class="col-sm-5">
                      <input class="form-control" name="order_number" id="order_number" placeholder="Nomor Order" type="text" v-model="order_number">
                    </div>
                  </div>
                </form>
                <hr>
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="order_number" class="col-sm-1 control-label">SKU :</label>
                    <div class="col-sm-5">
                      <input class="form-control" name="sku" id="sku" v-model="sku" placeholder="Nomor SKU" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="order_number" class="col-sm-1 control-label">Jumlah :</label>
                    <div class="col-sm-5">
                      <input class="form-control" name="sku" id="sku" v-model="jumlah" placeholder="Nomor SKU" type="text">
                    </div>
                  </div>

                  {{-- <div class="form-group">
                    <label for="order_number" class="col-sm-1 control-label">Nama :</label>
                    <div class="col-sm-5">
                      <input class="form-control" name="name" id="name" placeholder="Nama produk" type="text">
                    </div>
                  </div> --}}

                  <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-1">
                      <button type="button" class="btn btn-success" name="button" @click="onPressAdd">Tambah</button>
                    </div>
                  </div>
                </form>

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
                    <th>#</th>
                  </tr>
                  <tbody>
                    <tr v-for="(product, index) in products">
                      <td>
                        @{{product.sku}}
                      </td>
                      <td>
                        @{{product.name}}
                      </td>
                      <td>
                        @{{product.jumlah}}
                      </td>
                      <td><button type="button" class="btn btn-small btn-danger pull-right" @click="deleteProduk(index)" name="button">hapus</button></td>
                    </tr>
                    <tr>
                      <td colspan="2">Total</td>
                      <td>@{{total}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" @click="onOrder">Pesan sekarang</button>
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
    let API_URL = '{{url('api')}}';
    var vo = new Vue({
      el : '#app',
      data : {
        order_number : '{{ 'ORDER' . rand(10000,99999)}}',
        sku : null,
        jumlah : 1,
        products: []
      },
      computed : {
        total(){
          var sum = 0;
          for (var i = 0; i < this.products.length; i++) {
            var total = this.products[i]['jumlah'] * this.products[i]['selling_price'];
            sum += total
          }
          return sum;
        }
      },
      methods : {
        onOrder(){
          $.ajax({
            url : API_URL + '/order/post',
            type : 'POST',
            data : {
              order_number : this.order_number,
              products : this.products,
            },
            success: (res) => {
              alert(res.message);
              this.products = [];
            }
          });
        },
        setJumlah(sku) {
           let projects = this.products;
           for (var i in projects) {
             if (projects[i].sku == sku) {
                projects[i].jumlah = projects[i].jumlah + 1;
                break; //Stop this loop, we found it!
             }
           }
        },
        onBayar(){
          $.ajax({
            url : API_URL + '/product/post',
            type : 'POST',
            data : {
              order_number : this.order_number,
              products : this.products,
              user_id : '{{Auth::user()->id}}'
            },
            success: (res) => {
              alert(res.message);
              this.products = [];
            }
          });
        },
        setData(resource){
          // this.products.push(resource)
          resource.jumlah = this.jumlah;
          let res = this.products
          var saring = res.filter(function(obj){
            return obj.sku == resource.sku;
          })[0];

          if(typeof saring == 'undefined'){
            this.products.push(resource)
          }else{
            this.setJumlah(saring.sku);
          }

          console.log(this.products);

        },
        onPressAdd(){
          if(this.sku == null){
            alert('Masukan SKU');
            return;
          }
          // alert('hello : ' + this.sku)
          $.ajax({
            url : API_URL + '/product/get/' + this.sku,
            success: (response) => {
              this.setData(response)
            },
            error: function(error){
              alert('data tidak ditemukan !');
            }
          });
        },
        deleteProduk(index){
          this.products.splice(index, 1)
        }
      }
    })
  </script>

@endsection
