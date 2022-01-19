@extends('backend.master')

@section('main-contant')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Footer Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      @if(session('message'))
      <div class="alert alert-success" role="alert" width="400px">
        {{Session::get('message')}}
      </div>
      @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                 <h3>Product list
                 <a class="btn btn-success float-right"href="{{route('products.view')}}"><i class="fa fa-plus-circle"></i>Product</a>
                 </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <tr>
                        <td>Catagory</td>
                        <td>{{$details['category']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Band</td>
                        <td>{{$details['brand']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td>{{$details->name}}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{$details->price}}.Tk</td>
                    </tr>
                    <tr>
                        <td>Short Descrioption</td>
                        <td>{{$details->sort_desc}}</td>
                    </tr>
                    <tr>
                        <td>long Descrioption</td>
                        <td>{{$details->long_desc}}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                          <img src="{{(!empty($details->image))?asset('/upload/product_image/'.$details->image):asset('/upload/no_image.png')}}" 
                          style="height:50px; width:50px;">
                        </td>
                    </tr>
                    <tr>
                        <td>Color</td>
                        <td>
                            @php
                                $colors = App\Model\Productscolor::where('product_id',$details->id)->get();
                            @endphp
                            @foreach ($colors as $item)
                               {{$item['color']['name']}}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>
                            @php
                                $sizes = App\Model\Productssize::where('product_id',$details->id)->get();
                            @endphp
                            @foreach ($sizes as $item)
                               {{$item['size']['name']}}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            @php
                                $images = App\Model\Productsimage::where('product_id',$details->id)->get();
                            @endphp
                            @foreach ($images as $item)
                            <img src="{{asset('/upload/subproduct_image/'.$item->sub_image)}}" 
                            style="height:50px; width:50px;">
                            @endforeach
                        </td>
                    </tr>
                   
                </table>
                </div>
                <!-- /.card-body -->
              </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection

