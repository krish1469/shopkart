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
                  <td class="col-md-1">
                   <label for="">Date</label>
                  </td>
                  <td class="col-md-2">
                   <label for="">Total</label>
                  </td>
                  <td class="col-md-3">
                   <label for="">Payment</label>
                  </td>
                  <td class="col-md-2">
                   <label for="">Invoice</label>
                  </td>
                  <td class="col-md-2">
                   <label for="">Order Status</label>
                  </td>
                  <td class="col-md-2">
                   <label for="">Action</label>
                  </td>
                </tr>
                @forelse ($orders as $order)
                 <tr>
                   <td class="col-md-1">
                    <label for="">{{ $order->order_date }}</label>
                   </td>
                   <td class="col-md-2">
                    <label for="">₹{{ $order->amount }}.00</label>
                   </td>
                   <td class="col-md-3">
                    <label for="">{{ $order->payment_method }}</label>
                   </td>
                   <td class="col-md-2">
                    <label for="">{{ $order->invoice_no }}</label>
                   </td>
                   <td class="col-md-2">
                    <label for="">
                     <span class="badge badge-pill badge-warning" style="background: #e72b2b">{{ $order->status }}</span>
                     {{-- <span class="badge badge-pill badge-warning" style="background: #8f3c3c">Cancelled</span> --}}
                    </label>
                   </td>
                   <td class="col-md-2">
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

                 @empty
                 <h2 class="text-danger">No Cancelled Orders Found</h2>

                @endforelse 
               </tbody>
              </table>
             </div>
            </div>

        </div>{{-- End Row --}}
    </div>
</div>

@endsection
