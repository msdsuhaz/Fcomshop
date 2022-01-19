<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Order;
use App\Model\Payment;
use App\Model\OrderDetails;

class OrderController extends Controller
{
     public function PanddingOrder(){
        $data['orders'] = Order::where('status','0')->get();
        return view('backend.order.pandding-list',$data);
     }

     public function ApprovedOrder(){
        $data['orders'] = Order::where('status','1')->get();
        return view('backend.order.approved-list',$data);
     }

     public function OrderDetils($id){

        $data['orders']= Order::find($id);
        return view('backend.order.order-detilslist',$data);

     }

     public function ApprovedOrderlist($id){
        $order = Order::find($id);
        $order->status ='1';
        $order->save();
        return redirect()->route('Approved.Order');
     }
}

