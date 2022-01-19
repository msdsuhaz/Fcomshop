@extends('backend.master')

@section('main-contant')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pandding Order</h1>
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
                 <h3>order Pandding list 
                 <a class="btn btn-success float-right"href="{{route('contact.add')}}"><i class="fa fa-plus-circle"></i>Add contact</a>
                 </h3>
              </div>
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-hover  table-sm">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Order No</th>
                            <th>Total Amount</th>
                            <th>payment type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key=>$order)
                                    <tr class="{{$order->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$order->order_no}}</td>
                                        <td>{{$order->order_total}}</td>
                                        <td>
                                            {{$order['payment']['payment_method']}}
                                            @if($order['payment']['payment_method'] =='bikas')
                                                (Transaction Number:{{$order['payment']['transtaction_no']}});
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->status=='0')
                                                <span style="background:red;">Unapproverd</span>
                                            @elseif($order->status=='1')
                                               <span style="background:green;">approverd</span>
                                            @endif
                                        </td>
                                        <td>
                                          <a href="{{route('approved.orderlist',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>  
                                        </td>
                                    </tr>
                             @endforeach
                    
                    </tbody>
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

