@extends('layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Penjualan
    </h1>
  </section>

  <!-- Main content -->
  <section class="content" id="app">
    <div class="row">
      <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Penjualan Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('selling.sell.post')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group @if($errors->has('note_number')) has-error @endif">
                  <label for="name">Nota Number</label>
                  <input class="form-control" id="name" name="note_number" placeholder="Nomor Nota" type="text">
                  <p class="help-block">
                    {{$errors->first('note_number')}}
                  </p>
                </div>
                <div class="form-group @if($errors->has('sku')) has-error @endif">
                  <label for="exampleInputEmail1">SKU</label>
                  <input class="form-control" v-model="sku" id="sku" name="sku" placeholder="Nomor SKU" type="text">
                  <p class="help-block">
                    {{$errors->first('sku')}}
                  </p>
                </div>
                <div class="">
                  <button type="button" class="btn btn-success" @click="onPressAdd" name="button">Tambah</button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>

                  <tr>
                    <th>
                      Nomor
                    </th>
                    <th>
                      Nama Produk
                    </th>
                    <th>
                      Jumlah
                    </th>
                    <th>
                      Harga
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product in products">
                    <td>
                      @{{product.sku}}
                    </td>
                    <td>
                      @{{product.name}}
                    </td>
                    <td>
                      @{{product.jumlah}}
                    </td>
                    <td>
                      @{{product.jumlah * product.selling_price}}
                    </td>
                  </tr>
                </tbody>
                </table>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary btn-lg pull-right" @click="onBayar">Bayar</button>
              </div>
            </form>
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
        note_number : null,
        sku : null,
        products: []
      },
      methods : {
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
              note_number : this.note_number,
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
          resource.jumlah = 1;
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
        }
      }
    })
  </script>

@endsection
