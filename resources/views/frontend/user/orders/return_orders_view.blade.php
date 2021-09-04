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
                  <td class="col-md-2" align="center">
                   <label for="">Payment</label>
                  </td>
                  <td class="col-md-2" align="center">
                   <label for="">Invoice</label>
                  </td>
                  <td class="col-md-4" align="center">
                   <label for="">Return reason</label>
                  </td>
                  <td class="col-md-1" align="center">
                   <label for="">Order Status</label>
                  </td>
                  {{-- <td class="col-md-3">
                   <label for="">Action</label>
                  </td> --}}
                </tr>
                @foreach ($orders as $order)
                 <tr>
                   <td class="col-md-1" align="center">
                    <label for="">{{ $order->order_date }}</label>
                   </td>
                   <td class="col-md-2" align="center">
                    <label for="">₹{{ $order->amount }}.00</label>
                   </td>
                   <td class="col-md-2" align="center">
                    <label for="">{{ $order->payment_method }}</label>
                   </td>
                   <td class="col-md-2" align="center">
                    <label for="">{{ $order->invoice_no }}</label>
                   </td>
                   <td class="col-md-4" align="center">
                    <label for="">{{ $order->return_reason }}</label>
                   </td>
                   <td class="col-md-1" align="center">
                    <label for="">
                      @if($order->return_order == 0)
                          <span class="badge badge-pill badge-warning" style="background: #1c73a5">No Return Request</span>
                      @elseif($order->return_order == 1)
                          <span class="badge badge-pill badge-warning" style="background: #5b1a68">Pending</span>
                          <span class="badge badge-pill badge-warning" style="background: #f14646">Return Requested</span>
                      @elseif($order->return_order == 2)
                          <span class="badge badge-pill badge-success" style="background: #308120">Return Approved</span>
                      @endif
                    </label>
                   </td>
                   {{-- <td class="col-md-3">
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
                   </td> --}}
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
