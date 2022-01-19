@extends('backend.master')

@section('main-contant')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Color</h1>
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
                 <h3>Color list
                 <a class="btn btn-success float-right"href="{{route('color.add')}}"><i class="fa fa-plus-circle"></i>Add Color</a>
                 </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Color Name</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach( $alldata as $key => $colorData)
                      @php
                       $countColor =App\Model\Productscolor::where('color_id', $colorData->id)->count();
                      @endphp
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$colorData->name}}</td>
                        <td>
                            <a title="Edit" class="btn btn-sm btn-primary" href="{{route('color.edit',$colorData->id)}}"><i class="fa fa-edit"></i></a>
                            @if($countColor<1)
                            <a title="Delete" id ="delete" class="btn btn-sm btn-danger" href="{{route('color.delete',$colorData->id)}}"><i class="fa fa-trash"></i></a>
                            @endif
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

