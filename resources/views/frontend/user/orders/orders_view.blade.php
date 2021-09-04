@extends('frontend.main_master')
@section('content')
    
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-1">

            </div>
            <div class="col-md-9">
             <div class="table-responsive">
              <table class="table">
               <tbody>
                <tr style="background: #e2e2e2;">
                  <td class="col-md-1" align="center">
                   <label for="">Date</label>
                  </td>
                  <td class="col-md-2" align="center">
                   <label for="">Total Amount</label>
                  </td>
                  <td class="col-md-3" align="center">
                   <label for="">Payment</label>
                  </td>
                  <td class="col-md-2" align="center">
                   <label for="">Invoice</label>
                  </td>
                  <td class="col-md-1" align="center">
                   <label for="">Order Status</label>
                  </td>
                  <td class="col-md-3" align="center">
                   <label for="">Action</label>
                  </td>
                </tr>
                @foreach ($orders as $order)
                 <tr>
                   <td class="col-md-1" align="center">
                    <label for="">{{ $order->order_date }}</label>
                   </td>
                   <td class="col-md-2" align="center">
                    <label for="">₹{{ $order->amount }}.00</label>
                   </td>
                   <td class="col-md-3" align="center">
                    <label for="">{{ $order->payment_method }}</label>
                   </td>
                   <td class="col-md-2" align="center">
                    <label for="">{{ $order->invoice_no }}</label>
                   </td>
                   <td class="col-md-1" align="center">
                    <label for="">
                      @if($order->status == 'Pending')
                          <span class="badge badge-pill badge-warning" style="background: #740e7e">Pending</span>
                      @elseif($order->status == 'Confirmed')
                          <span class="badge badge-pill badge-warning" style="background: #169bda">Confirmed</span>
                      @elseif($order->status == 'Processing')
                          <span class="badge badge-pill badge-warning" style="background: #f3ae18">Processing</span>
                      @elseif($order->status == 'Picked')
                          <span class="badge badge-pill badge-warning" style="background: #fd3d87">Picked</span>
                      @elseif($order->status == 'Shipped')
                          <span class="badge badge-pill badge-warning" style="background: #ecf019">Shipped</span>
                      @elseif($order->status == 'Delivered')
                          <span class="badge badge-pill badge-warning" style="background: #4f881a">Delivered</span>
                          @if($order->return_order == 1)
                              <span class="badge badge-pill badge-warning" style="background: #f14646">Return Requested</span>
                          @endif
                      @else
                          <span class="badge badge-pill badge-warning" style="background: #f82222">Cancelled</span>
                      @endif
                    </label>
                   </td>
                   <td class="col-md-3" align="center">
                    <label for="">
                     <div>
                      <div align="center" style="margin-bottom: 5px">
                       <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>&nbsp;View</a>
                      </div>
                      <div>
                       <a target="_blank" href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download"></i>&nbsp;Invoice</a>
                      </div>
                     </div>
                    </label>
                   </td>
                 </tr>
                @endforeach 
               </tbody>
              </table>
             </div>
            </div>

        </div>{{-- End Row --}}
    </div>
</div>

@endsection
