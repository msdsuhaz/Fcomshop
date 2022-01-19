@extends('backend.master')

@section('main-contant')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Product</h1>
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
                 <a class="btn btn-success float-right"href="{{route('products.add')}}"><i class="fa fa-plus-circle"></i>Add Product</a>
                 </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach( $alldata as $key => $porductData)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$porductData['category']['name']}}</td>
                        <td>{{$porductData['brand']['name']}}</td>
                        <td>{{$porductData->name}}</td>
                        <td>{{$porductData->price}}</td>
                        <td>
                          <img  id="showImage" src="{{(!empty($porductData->image))?asset('/upload/product_image/'.$porductData->image):asset('/upload/no_image.png')}}"
                           style="width:150px; height:100px;">
                        </td>
                        <td>
                            <a title="Edit" class="btn btn-sm btn-primary" href="{{route('products.edit',$porductData->id)}}"><i class="fa fa-edit"></i></a>
                            <a title="Edit" class="btn btn-sm btn-success" href="{{route('products.details',$porductData->id)}}"><i class="fa fa-eye"></i></a>
                            <a title="Delete" id ="delete" class="btn btn-sm btn-danger" href="{{route('products.delete',$porductData->id)}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
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

